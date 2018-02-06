<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/4/18
 * Time: 3:55 PM
 */

class GetAnomaliesCountCest
{
    const API_URL = 'anomalies/count';


    // tests
    public function tryToTest(ApiTester $I)
    {
        $I->amAuthorized();
        $I->haveHttpHeader("Accept", "application/json");
        $I->sendGET(self::API_URL );
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
        $I->canSeeResponseContainsJson([
            'total' => '1'
        ]);
        $I->canSeeResponseMatchesJsonType([
            'result' => [
                'new' => 'integer',
                'accepted' => 'integer',
                'rejected' => 'integer',
                'total' => 'integer'
            ]
        ]);

    }

}