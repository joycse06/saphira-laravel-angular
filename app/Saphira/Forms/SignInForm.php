<?php namespace Saphira\Forms;

use Laracasts\Validation\FormValidator;

/**
 * Class SignInForm
 * @package Saphira\Forms
 */
class SignInForm extends FormValidator{

    /**
     * Validation Rules for the Signin form
     * @var array
     */
    protected $rules = [
        'email' => 'required',
        'password' => 'required'
    ];
}