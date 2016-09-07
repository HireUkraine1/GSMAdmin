<?php
namespace Step\Acceptance;


class Steps extends \AcceptanceTester
{

    public static $URL = '/';
    public static $clickLogIn = '//*[@name="yt0"]';
    public static $success = '.pictogram-menu';
    public static $email = '#LoginForm_username';
    public static $pass = '#LoginForm_password';
    public static $submit = '[name="send"] > span > span';
    public static $logout = '//div[@class="fright"]/ul/li[3]/a[2]';
    public static $img = '//a[@href="/search"]/img';

    public function login($email,$pass)
    {
        $I = $this;
        $I->amOnPage(self::$URL);
        $I->fillField(self::$email,$email);
        $I->fillField(self::$pass,$pass);
        $I->click(self::$clickLogIn);
        $I->waitForElement(self::$success);
        $I->waitForElement(self::$img);
        $I->seeElement(self::$success);
    }

    public function checkMenu()
    {
        $I = $this;
        $links = count($I->grabMultiple('//*[@class="pictogram-menu"]/div[2]/div'));
        for ($l = 1; $l <= $links; $l++ ) {
            $I->waitForElement('//*[@class="pictogram-menu"]/div[2]/div['.$l.']//img');
            $I->click('//*[@class="pictogram-menu"]/div[2]/div['.$l.']//img');
            switch ($l){
                case 1:
                    $I->seeInCurrentUrl('/user/index');
                    break;
                case 2:
                    $I->seeInCurrentUrl('/manageContacts');
                    break;
                case 3;
                    $I->seeInCurrentUrl('/');
                    break;
            }
        }
    }
}