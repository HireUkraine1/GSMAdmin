<?php
use \Step\Acceptance;

/**
 * @group test
 */
class TestCest
{
    function LoginEmpty( \AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('//*[@name="yt0"]');
       // $I->click('.menu-item');
       // $I->waitForElement('.ym-inline gsm-button gsm-primary');

    }


}

