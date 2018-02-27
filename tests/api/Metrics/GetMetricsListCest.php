<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/25/18
 * Time: 5:38 PM
 */

class GetMetricsListCest
{
    const API_URL = 'metrics';


    // tests
    public function tryToTest(ApiTester $I)
    {
        $I->amAuthorizedByUser();
        $I->haveHttpHeader("Accept", "application/json");
        $I->haveHttpHeader("X-Company-Id","1");
        $I->sendGET(self::API_URL );
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();

    }
}