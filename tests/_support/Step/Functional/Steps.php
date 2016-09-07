<?php
namespace Step\Functional;


class Steps extends \FunctionalTester
{
    public function apiSdsData  ()
    {
        $I = $this;

        $section_1 = [[[
                'section' => 'integer',
                'name' => 'string',
                'effective_date' => 'string:date',
                'trade_name' => 'string|null',
                'usage' => 'string|null',
                'manufacturer' => 'array'
        ]]];
        $api_sds_detail_root = [
                'api_version' => 'string:>0',
                'type' => 'string',
                'language' => 'string',
                'product_identifier' => 'string',
                'product_sds' => [[
                        'effective_date' => 'string:date',
                        'last_modified_date' => 'string:date',
                        'sds_data' => $section_1
                ]]


        ];

        $I->sendGET('/sds_detail/XV3424S1PD23/newnew%20newfm');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseMatchesJsonType($api_sds_detail_root);
    }

    public function productGet(){
        $I = $this;

        $product = [
            'status' => 'integer',
            'body' => [
                'productId' => 'integer',
                'revisionId' => 'integer',
                'isTranslated' => 'boolean',
                'language' => 'string'
            ]

        ];

        $I->sendGET('/product/getDocumentForLanguage/productId/26079/revisionId/2614/language/es');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseMatchesJsonType($product);
    }

    public function productGetTranslation(){
        $I = $this;

        $product = [
            'status' => 'integer',
            'body' => [
                'productId' => 'integer',
                'revisionId' => 'integer',
                'languages' => 'array'
            ]
        ];

        $I->sendGET('/product/getDocumentTranslationList/productId/26079/revisionId/2614/');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseMatchesJsonType($product);
        $I->seeResponseContains('"languages":["es","ru","zu","en"]');
    }
    
}
