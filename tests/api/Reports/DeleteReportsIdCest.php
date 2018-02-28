<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/22/18
 * Time: 6:14 PM
 */

class DeleteReportsIdCest
{
    const API_URL = 'reports';

    public function tryToTest(\ApiTester $I)
    {

        $I->amAuthorizedByUser();
        $I->haveHttpHeader("Accept", "application/json");
        $I->sendDELETE("reports/191", [
 //           'id' => '[191]'
        ]);
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
        $I->sendGET(self::API_URL );
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
        $I->dontSeeResponseContainsJson([
            'id' => '[191]'
        ]);
    }
}