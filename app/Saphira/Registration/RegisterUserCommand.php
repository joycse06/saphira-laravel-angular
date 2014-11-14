<?php namespace Saphira\Registration;

class RegisterUserCommand
{
    public $displayName;
    public $email;
    public $password;
    public $username;

    public function __construct($displayName, $email, $username, $password)
    {
        $this->displayName = $displayName;
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
    }
}