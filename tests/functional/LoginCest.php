<?php

class LoginCest
{

    public function _before(\FunctionalTester $I)
    {
        $I->amOnRoute(['user/security/login']);
    }

    public function openAuthPage(\FunctionalTester $I)
    {
        $I->see('Sign in to start your session');
    }

    public function submitEmptyForm(\FunctionalTester $I){
        $I->submitForm('#login-form', []);
        $I->expectTo('see validations errors');
        $I->see('Login cannot be blank.');
        $I->see('Password cannot be blank.');
    }

    public function loginWithIncorrectPassword(\FunctionalTester $I){
        $I->submitForm('#login-form', [
            'login-form[login]' => 'webmaster',
            'login-form[password]' => 'wrong',
        ]);
        $I->expectTo('see validations errors');
        $I->see('Invalid login or password');
    }

    /*public function loginWithCorrectPassword(\FunctionalTester $I){
        $I->submitForm('#login-form', [
            'login-form[login]' => 'webmaster',
            'login-form[password]' => 'webmaster',
        ]);
        $I->see('Hello');
    }*/

}
