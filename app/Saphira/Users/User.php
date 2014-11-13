<?php namespace Saphira\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent, Hash;
use Saphira\Registration\Events\UserRegistered;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class User extends \Cartalyst\Sentry\Users\Eloquent\User
{

    use UserTrait, RemindableTrait, EventGenerator, PresentableTrait;

    /**
     * Path to the presenter for a user
     * @var string
     */
    protected $presenter = 'Larabook\Users\UserPresenter';


    /**
     * Passwords must always be hashed
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }


    /**
     * Register a new user
     *
     * @static
     * @param $username
     * @param $email
     * @param $password
     * @return static
     */
    public static function register($displayName, $email, $username, $password)
    {
        $user = new static( compact('displayName', 'email', 'username', 'password') );

        $user->raise(new UserRegistered($user));

        return $user;
    }

    /**
     * Determine if the given user is the same
     * as the current one
     * @param $user
     * @return bool
     */
    public function is($user)
    {
        if(is_null($user)) return false;
        return $this->username == $user->username;
    }

}
