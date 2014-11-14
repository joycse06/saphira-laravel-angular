<?php

use Saphira\Forms\SignInForm;
use Saphira\Users\User;
use Saphira\Session\SentrySession;

class SessionsController extends ApiController {

    protected $session;
    protected $signInForm;

    public function __construct(SentrySession $session, SignInForm $signInForm)
    {
        $this->session = $session;
        $this->signInForm = $signInForm;
    }

    /**
     * Try to login user.
     *
     * @return json
     */
    public function login()
    {
        $this->signInForm->validate(Input::all());


        $result = $this->session->store(Input::all());

        if (isset($result['user']) && ($result['success'] > 0)) {
            return $this->respondWithArray([
                'token' => $this->createToken($result['user']),
                'message' => 'You are logged in.'
            ]);
        }

        $error = isset($result['error']) ? array_pop($result) : trans('session.notfound');
        return Response::json(array(
            'success' => 0,
            'message' => 'Something went wrong please check your username and password',
            'errors' => array('error' => array($error),
            'input' => Input::all()
            )), 200);


    }

}