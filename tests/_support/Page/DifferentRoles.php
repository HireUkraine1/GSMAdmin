<?php
namespace Page;

class DifferentRoles
{
    public static $URL = '/';
    public static $URL2 = '/search';
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

    /**
     * @var \AcceptanceTester
     * Role Users
     */

    public static $search = '#_search>img';
    public static $addRm = '#_family_new>img';
    public static $gsmMaster = '#_gsmMaster_index>img';
    public static $bulkTranslation = '#_bulkTranslation>img';
    public static $domain = '#_domain>img';
    public static $managerUsers = '#_user_index>img';
    public static $manageContacts = '#_manageContacts>img';

    public static $clickSearch = '//*[@class="menu-block"]//a[@href="/search"]/img';
    public static $clickAddRm = '//*[@class="menu-block"]//a[@href="/family/new"]/img';
    public static $clickGsmMaster = '//*[@class="menu-block"]//a[@href="/gsmMaster/index"]/img';
    public static $clickBulkTranslation = '//*[@class="menu-block"]//a[@href="/bulkTranslation"]/img';
    public static $clickDomain = '//*[@class="menu-block"]//a[@href="/domain"]/img';
    public static $clickUsers = '//*[@class="menu-block"]//a[@href="/user/index"]/img';
    public static $clickContracts = '//*[@class="menu-block"]//a[@href="/manageContacts"]/img';
    public static $pageContent = 'h2';

    protected $tester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->tester = $I;
    }

    public function roleUsers($email)
    {
        $I = $this->tester;
        $I->amOnPage(self::$URL);
        $I->fillField(self::$email,$email);
        $I->fillField(self::$pass,'123456789');
        $I->click(self::$clickLogIn);
        $I->waitForElement(self::$success);
        $I->waitForElement(self::$img);
        $I->seeElement(self::$success);
    }

    public function logout(){
        $I = $this->tester;
        $I->seeElement(self::$logout);
        $I->click(self::$logout);
    }

    public function gsmeditor()
    {
        $I = $this->tester;
        $I->seeElement(self::$addRm);
        $I->click(self::$clickAddRm);
        $I->seeInCurrentUrl('/family/new');
        $I->seeElement(self::$gsmMaster);
        $I->click(self::$clickGsmMaster);
        $I->seeInCurrentUrl('/gsmMaster/index');
        $I->seeElement(self::$bulkTranslation);
        $I->click(self::$clickBulkTranslation);
        $I->seeInCurrentUrl('/bulkTranslation');
        $I->seeElement(self::$manageContacts);
        $I->click(self::$clickContracts);
        $I->seeInCurrentUrl('/manageContacts');
        $I->seeElement(self::$search);
        $I->click(self::$clickSearch);
        $I->seeInCurrentUrl('/search');
    }

    public function gsmadmin()
    {
        $I = $this->tester;

        self::gsmeditor();

        $I->seeElement(self::$domain);
        $I->click(self::$clickDomain);
        $I->seeInCurrentUrl('/domain');
        $I->seeElement(self::$managerUsers);
        $I->click(self::$clickUsers);
        $I->seeInCurrentUrl('/user/index');
    }

    public function sdsAdmin()
    {
        $I = $this->tester;
        $I->dontSeeElement(self::$addRm);
        $I->seeElement(self::$gsmMaster);
        $I->click(self::$clickGsmMaster);
        $I->seeInCurrentUrl('/gsmMaster/index');
        $I->dontSeeElement(self::$bulkTranslation);
        $I->seeElement(self::$managerUsers);
        $I->click(self::$clickUsers);
        $I->seeInCurrentUrl('/user/index');
        $I->seeElement(self::$manageContacts);
        $I->click(self::$clickContracts);
        $I->seeInCurrentUrl('/manageContacts');
        $I->seeElement(self::$search);
        $I->click(self::$clickSearch);
        $I->seeInCurrentUrl('/search');
    }

    public function sdspAuthor()
    {
        $I = $this->tester;
        $I->dontSeeElement(self::$addRm);
        $I->dontSeeElement(self::$gsmMaster);
        $I->dontSeeElement(self::$bulkTranslation);
        $I->dontSeeElement(self::$managerUsers);
        $I->seeElement(self::$manageContacts);
        $I->click(self::$clickContracts);
        $I->seeInCurrentUrl('/manageContacts');
        $I->seeElement(self::$search);
        $I->click(self::$clickSearch);
        $I->seeInCurrentUrl('/search');
    }

    public function invalidUrl403()
    {
        $I = $this->tester;
        $I->amOnPage(self::$URL2);
        $I->waitForElement(self::$pageContent);
        $I->see('Error 403',self::$pageContent);
        $I->waitForText('You are not authorized to perform this action.');
        self::logout();
    }


}