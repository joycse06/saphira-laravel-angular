<?php namespace Saphira\Forms;

use Laracasts\Validation\FormValidator;

/**
 * Class RegistrationFrom
 * @package Saphira\Forms
 */
class RegistrationForm extends FormValidator
{
    /**
     * Validation rules for the Registration Form
     * @var array
     */
    protected $rules = [
        'displayName' => 'required',
        'email'     => 'required|email|unique:users',
        'password'  => 'required'
    ];
}