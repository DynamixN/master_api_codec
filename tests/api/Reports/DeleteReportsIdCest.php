<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/22/18
 * Time: 6:14 PM
 */

class DeleteReportsIdCest
{
    public function tryToTest(\ApiTester $I)
    {
        $I->amAuthorized();
        $I->sendDELETE("reports/{id}", [
            'id' => '[79,80,81]'
        ]);
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
    }
}