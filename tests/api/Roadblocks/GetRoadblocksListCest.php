<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/4/18
 * Time: 3:33 PM
 */

class GetRoadblocksListCest
{
    const API_URL = 'roadblocks';


    // tests
    public function tryToTest(ApiTester $I)
    {
        $I->amAuthorizedByUser();
        $I->haveHttpHeader("Accept", "application/json");
        $I->sendGET(self::API_URL );
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
//        $I->canSeeResponseMathesJsonType();

    }
}