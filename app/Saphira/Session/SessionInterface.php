<?php namespace Saphira\Session;

/**
 * Interface SessionInterface
 * @package Saphira\Session
 */
interface SessionInterface {

    /**
     * Try to authenticate an user
     * @param $data
     * @return Array
     */
    public function store($data);

    /**
     * Logout an user
     * @return no return value
     */
    public function destroy();
}

