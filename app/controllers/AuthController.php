<?php
/**
 * Created by PhpStorm.
 * User: joy
 * Date: 11/12/14
 * Time: 8:05 PM
 */

use League\OAuth2\Client\Entity\User;
use Saphira\Forms\RegistrationForm;
use League\Fractal\Manager as FractalManager;
use Saphira\Registration\RegisterUserCommand;

class AuthController extends ApiController
{


    /**
     * @var Saphira\Forms\RegistraµtionFrom
     */
    private $registrationForm;

    public function __construct(RegistrationForm $registrationForm)
    {

        $this->registrationForm = $registrationForm;
        parent::__construct();
    }

    public function signup()
    {
        $this->registrationForm->validate(Input::all());

        $user = $this->execute(RegisterUserCommand::class);

        $createToken = [
            'id' => $user->id
        ];

        return $this->respondWithArray([
            'token' => $this->createToken($createToken),
            'message' => 'You have been successfully registered',
            'user' => $user->toArray()
        ]);

    }
}