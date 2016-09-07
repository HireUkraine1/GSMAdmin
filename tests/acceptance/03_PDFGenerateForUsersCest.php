<?php
use \Step\Acceptance;

/**
 * @group pdf
 */
class PDFGenerateForUsersCest
{
    function T111PDFGenerateForGsmeditorUser( \Page\DifferentRoles $checkPdf, \Step\Acceptance\Steps $I)
    {
        $checkPdf->roleUsers('gsmeditor@gustr.com');
        $I->checkSelectionForPdf();
    }

    function T112PDFGenerateForGsmauthorUser( \Page\DifferentRoles $checkPdf, \Step\Acceptance\Steps $I)
    {
        $checkPdf->roleUsers('gsmauthor@gustr.com');
        $I->checkSelectionForPdf();
    }

    function T113PDFGenerateForGsmsourcerUser( \Page\DifferentRoles $checkPdf, \Step\Acceptance\Steps $I)
    {
        $checkPdf->roleUsers('gsmsourcer@gustr.com');
        $I->checkSelectionForPdf();
    }

    function T114PDFGenerateForGsmadminUser( \Page\DifferentRoles $checkPdf, \Step\Acceptance\Steps $I)
    {
        $checkPdf->roleUsers('gsmadmin@gustr.com');
        $I->checkSelectionForPdf();
    }

    function T115PDFGenerateForSdspadminUser( \Page\DifferentRoles $checkPdf, \Step\Acceptance\Steps $I)
    {
        $checkPdf->roleUsers('sdspadmin@gustr.com');
        $I->checkSelectionForPdf();
    }

    function T116PDFGenerateForSdspauthorUser( \Page\DifferentRoles $checkPdf, \Step\Acceptance\Steps $I)
    {
        $checkPdf->roleUsers('sdspauthor@gustr.com');
        $I->checkSelectionForPdf();
    }






}

