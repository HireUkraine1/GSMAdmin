<?php
namespace Step\Acceptance;


class Steps extends \AcceptanceTester
{

    public function pagesToPdf()
    {
        $I = $this;
        $I->waitForElement('#type');
        $I->selectOption('#type', 'Product (Parent)');
        $I->waitAndClick('//*[@class="gsm-table-row"]//div[2]//span');

        $I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
            $handles = $webdriver->getWindowHandles();
            $last_window = end($handles);
            $webdriver->switchTo()->window($last_window);
        });

        $I->waitForElement('//tbody');
        $I->waitForElement('//tbody//td[contains(text(),"ID")]');
        $I->waitForElement('//select[@id ="pdfs"]');
    }

    public function checkSelectionForPdf ()
    {
        $I = $this;

        self::pagesToPdf();

        $selectPdf = count($I->grabMultiple('//select[@id ="pdfs"]/option'));

        for ($p = 2; $p <= $selectPdf; $p++) {
            $I->click('//select[@id ="pdfs"]/option[' . $p . ']');


            $I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
                $handles = $webdriver->getWindowHandles();
                $last_window = end($handles);
                $webdriver->switchTo()->window($last_window);
            });

            $I->waitAndScreen('p'.rand(1,1000).'df'.$p.'.png');

            self::pagesToPdf();
        }
        $I->click('a#generatePdf');

        $I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
            $handles = $webdriver->getWindowHandles();
            $last_window = end($handles);
            $webdriver->switchTo()->window($last_window);
        });


        $I->waitAndScreen('pdf'.$p.'.png');
        $I->switchToWindow();


    }



}