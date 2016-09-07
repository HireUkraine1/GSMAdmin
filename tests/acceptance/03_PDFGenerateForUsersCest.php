<?php
use \Step\Acceptance;

/**
 * @group pdf
 */
class PDFGenerateForUsersCest
{
    function checkPdfForGsmeditor( \Page\DifferentRoles $checkPdf, \Step\Acceptance\Steps $I)
    {
        $checkPdf->roleUsers('gsmeditor@gustr.com');
        $I->pagesToPdf();
        $I->checkSelectionForPdf();
    }
}

