<?php

class RegisterCest
{

    public function _before(\FunctionalTester $I)
    {
        $I->amOnRoute('user/registration/register');
    }

    public function openAuthPage(\FunctionalTester $I)
    {
        $I->see('Register a new membership');
    }

    public function submitEmptyForm(\FunctionalTester $I){
        $I->submitForm('#registration-form', []);
        $I->expectTo('see validations errors');
        $I->see('Email cannot be blank.');
        $I->see('Username cannot be blank.');
        $I->see('Password cannot be blank.');
    }

    public function submitWithInvalidEmail(\FunctionalTester $I){
        $I->submitForm('#registration-form', [
            'register-form[email]' => 'invalid@email',
            'register-form[username]' => 'testuser',
            'register-form[password]' => 'test1234',
        ]);
        $I->expectTo('see validations errors');
        $I->see('Email is not a valid email address.');
    }

    public function SubmitCorrectForm(\FunctionalTester $I){
        $I->submitForm('#registration-form', [
            'register-form[email]' => 'valid@email.ru',
            'register-form[username]' => 'testuser',
            'register-form[password]' => 'test1234',
        ]);
        $I->see('Your account has been created and a message with further instructions has been sent to your email');
    }

    public function tryToLoginWithNewUser(\FunctionalTester $I)
    {
        $I->amOnRoute('user/security/login');
        $I->submitForm('#login-form', [
            'login-form[login]' => 'testuser',
            'login-form[password]' => 'test1234',
        ]);
        $I->see('Hello');
    }

}
