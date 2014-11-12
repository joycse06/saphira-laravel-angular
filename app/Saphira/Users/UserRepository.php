<?php namespace Saphira\Users;
/**
 * Created by PhpStorm.
 * User: joy
 * Date: 11/12/14
 * Time: 8:09 PM
 */


class UserRepository
{
    public function save(User $user)
    {
        return $user->save();
    }

    public function findById($id)
    {
        return User::findOrFail($id);
    }
}