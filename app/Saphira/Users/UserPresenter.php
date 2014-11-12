<?php namespace Saphira\Users;
/**
 * Created by PhpStorm.
 * User: joy
 * Date: 11/12/14
 * Time: 8:54 PM
 */

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter
{
    public function gravatar($size = 30)
    {
        $email = md5($this->email);

        return "//gravatar.com/avatar/{$email}?s={$size}";
    }
}

