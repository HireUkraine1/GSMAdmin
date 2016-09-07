<?php
use \Step\Acceptance;

/**
 * @group login
 */
class LoginCest
{
    function LoginEmpty( \Page\Login $login)
    {
        $login->loginWrong();
    }
    function LoginWrongEmail( \Page\Login $login)
    {
        $login->loginWrongEmail('test');
    }
    function LoginWrongPass( \Page\Login $login)
    {
        $login->loginWrongPass('12345');
    }
    function LoginWrongData( \Page\Login $login)
    {
        $login->loginWrongData('test@mail.com','12345');
    }
    function LoginSuccess( \Page\Login $login)
    {
        $login->loginSuccess('yvikajvd@grandmasmail.com','123456789');
    }
    function LogoutSuccess( \Page\Login $login)
    {
        $login->logoutSuccess();
    }
}

