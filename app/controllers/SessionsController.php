<?php

use Saphira\Forms\SignInForm;
use Saphira\Users\User;

class SessionsController extends ApiController{

    /**
     * @var Saphira\Forms\SignInForm
     */
    private $signInForm;

    public function __construct(SignInForm $signInForm)
    {

        $this->signInForm = $signInForm;
    }

    public function login()
    {
        $this->signInForm->validate(Input::all());

        $user = User::where('email', '=', Input::get('email'))->first();

        if(!$user)
        {
            return $this->setStatusCode(401)->respondWithArray([
                'message' => 'Wrong email and/or password'
            ]);
        }else{
            return $this->respondWithArray([
                'token' => $this->createToken($user)
            ]);
        }
    }
}