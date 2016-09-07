<?php
namespace Page;

use Exception;

class Login
{

    public static $URL = '/';
    public static $clickLogIn = '//*[@name="yt0"]';
    public static $error = '.flash-error';
    public static $img = '//a[@href="/search"]/img';
    public static $success = '.pictogram-menu';
    public static $email = '#LoginForm_username';
    public static $pass = '#LoginForm_password';
    public static $submit = '[name="send"] > span > span';
    public static $logout ='#_admin_auth_logout';
    public static $loginForm = '#login-form';
    public static $msg = 'div.col-main > p';

    protected $tester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->tester = $I;
    }

    public function loginWrong()
    {
        $I = $this->tester;
        $I->amOnPage(self::$URL);
        $I->click(self::$clickLogIn);
        $I->waitForElement(self::$error);
        $I->see('Login Email cannot be blank.',self::$error);
        $I->see('Password cannot be blank.',self::$error);
    }

    public function loginWrongEmail($email)
    {
        $I = $this->tester;
        $I->fillField(self::$email,$email);
        $I->click(self::$clickLogIn);
        $I->waitForElement(self::$error);
        $I->see('Password cannot be blank.',self::$error);
    }
    public function loginWrongPass($pass)
    {
        $I = $this->tester;
        $I->fillField(self::$pass,$pass);
        $I->click(self::$clickLogIn);
        $I->waitForElement(self::$error);
        $I->see('Wrong login or password.',self::$error);
    }

    public function loginWrongData($email,$pass)
    {
        $I = $this->tester;
        $I->fillField(self::$email,$email);
        $I->fillField(self::$pass,$pass);
        $I->click(self::$clickLogIn);
        $I->waitForElement(self::$error);
        $I->see('Wrong login or password.',self::$error);
    }

    public function loginSuccess($email,$pass)
    {
        $I = $this->tester;
        $I->amOnPage(self::$URL);
        $I->fillField(self::$email,$email);
        $I->fillField(self::$pass,$pass);
        $I->click(self::$clickLogIn);
        $I->waitForElement(self::$success);
        $I->waitForElement(self::$img);
        $I->seeElement(self::$success);
    }

    public function logoutSuccess()
    {
        $I = $this->tester;
        $I->waitForElement(self::$logout);
        $I->click(self::$logout);
        $I->seeInCurrentUrl(self::$URL);
        $I->seeElement(self::$loginForm);
    }





}