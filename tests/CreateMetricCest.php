<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/24/18
 * Time: 5:51 PM
 */

class CreateMetricCest
{
    public function tryToTest(ApiTester $I)
    {
        $I->amAuthorized();
        $I->haveHttpHeader("Accept", "application/json");
        $I->haveHttpHeader("X-Company-Id","1");
        $I->sendPOST('metrics', [
            'X-Company-Id' => '1',
            'type' => 'number',
            'name' => 'netto_1',
            'is_additive' => '0',
            'is_positive' => '0',
            'is_complex' => '0',
            'interval' => '2592000'

        ]);
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
        $I->canSeeResponseContainsJson([
            'type' => '2'
        ]);

    }
}