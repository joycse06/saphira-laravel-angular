<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('login');
		}
	}
});

/* Api authentication Filter */

Route::filter('apiauth', function()
{
    if (!Request::header('Authorization'))
    {
        return Response::json(array('message' => 'Please make sure your request has an Authorization header'), 401);
    }

    $token = explode(' ', Request::header('Authorization'))[1];
    $payloadObject = JWT::decode($token, Config::get('secrets.TOKEN_SECRET'));
    $payload = json_decode(json_encode($payloadObject), true);

    if ($payload['exp'] < time())
    {
        return Response::json(array('message' => 'Token has expired'));
    }

    $user_id = $payload['sub'];

    try
    {
        $user = Sentry::findUserById($user_id);

        Sentry::login($user, false);
    }
    catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
    {
        return Response::json(array('message' => 'User was not found.'), 401);
    }
    catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
    {
        return Response::json(array('message' => 'Please activate your account.'), 401);
    }

    catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
    {
        return Response::json(array('message' => 'You are banned.'), 200);
    }
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
    if (Session::token() !== Input::get('_token'))
    {
        throw new IlluminateSessionTokenMismatchException;
    }
});

Route::filter('xhr', function(){
    if(!Request::ajax())
        return Response::make('Not Found', 404);
});

// XSRF token over xhr requests, sanity check
Route::filter('xhrf', function() {
   if((!isset($_COOKIE['XSRF-TOKEN']) || is_null(Request::header('X-XSRF-TOKEN'))) ||
       ($_COOKIE['XSRF-TOKEN'] !== Request::header('X-XSRF-TOKEN')) )
       return Response::make('Not Found', 404);
});

// To Protect against Json Injection
App::after(function($request, $response)
{
    if($response instanceof \Illuminate\Http\JsonResponse) {
        $json = ")]}',\n" . $response->getContent();
        return $response->setContent($json);
    }
});
