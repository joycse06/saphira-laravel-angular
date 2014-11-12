<?php namespace Saphira\Registration\Events;

use Saphira\Users\User;

class UserRegistered
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}