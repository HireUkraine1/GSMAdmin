<?php
use \Step\Functional;
/**
 * @group api
 */
class WebApiJsonCest
{
    public function checkValidationJsonSdsDetail(\Step\Functional\Steps $I){
        $I->apiSdsData();
    }

    public function checkValidationJsonProductGet(\Step\Functional\Steps $I){
        $I->productGet();
    }

    public function checkValidationJsonProductGetTranslation(\Step\Functional\Steps $I){
        $I->productGetTranslation();
    }
}
