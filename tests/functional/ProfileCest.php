<?php

class ProfileCest
{

    public function changePassword(\FunctionalTester $I)
    {
        $I->amOnRoute('user/security/login');
        $I->see('Sign in to start your session');
        $I->submitForm('#login-form', [
            'login-form[login]' => 'webmaster',
            'login-form[password]' => 'webmaster',
        ]);
        $I->see('Hello');

        $I->amOnRoute('user/settings/account');
        $I->see('Account settings');

        $I->submitForm('#account-form', [
            'settings-form[new_password]' => 'new_password',
            'settings-form[current_password]]' => 'webmaster',
        ]);
        
        $I->see('Your account details have been updated');

    }

    public function loginWithNewPassword(\FunctionalTester $I)
    {

        $I->amOnRoute('user/security/login');
        $I->see('Sign in to start your session');
        $I->submitForm('#login-form', [
            'login-form[login]' => 'webmaster',
            'login-form[password]' => 'new_password',
        ]);
        $I->see('Hello');

    }

    public function changePasswordBack(\FunctionalTester $I)
    {
        $I->amOnRoute('user/security/login');
        $I->see('Sign in to start your session');
        $I->submitForm('#login-form', [
            'login-form[login]' => 'webmaster',
            'login-form[password]' => 'new_password',
        ]);
        $I->see('Hello');

        $I->amOnRoute('user/settings/account');
        $I->see('Account settings');

        $I->submitForm('#account-form', [
            'settings-form[new_password]' => 'webmaster',
            'settings-form[current_password]]' => 'new_password',
        ]);
        
        $I->see('Your account details have been updated');

    }

}
