<?php namespace Saphira\Registration;

class RegisterUserCommand
{
    public $displayName;
    public $email;
    public $password;

    public function __construct($displayName, $email, $password)
    {
        $this->displayName = $displayName;
        $this->email = $email;
        $this->password = $password;
    }
}