<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/20/17
 * Time: 4:47 PM
 */

class GetAnomalyListCest
{

    const API_URL = 'anomalies';


    // tests
    public function tryToTest(ApiTester $I)
    {
        $I->amAuthorized();
        $I->haveHttpHeader("Accept", "application/json");
        $I->sendGET(self::API_URL );
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
        $I->canSeeResponseContainsJson([
            'type' => '2'
        ]);

    }
}