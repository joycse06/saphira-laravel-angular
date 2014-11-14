<?php
use Laracasts\Commander\CommanderTrait;
use Saphira\Users\User;


class BaseController extends Controller {

	use CommanderTrait;

    /**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

    protected function createToken(Array $user){
        $payload = [
          'iss' => Request::url(),
          'sub' => $user['id'],
          'iat' => time(),
          'exp' => time() + (2 * 7 * 24 * 60 * 60)
        ];

        return JWT::encode($payload,Config::get('secrets.TOKEN_SECRET'));
    }

}
