<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/16/18
 * Time: 4:16 PM
 */

class TestPostCreateMetricCest
{
    const API_URL = 'metrics';

    public function tryToTest(\ApiTester $I)
    {
        $name_m = 'jack_1';


        $I->amAuthorizedByUser();
        $I->amCreateMetric($name_m);
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
        $I->canSeeResponseContainsJson([
            'type' => 'number',
            'name' => 'jack_1',
            'is_additive' => '0',
            'is_positive' => '0',
            'is_complex' => '0',
            'interval' => '2592000'
        ]);
        $I->sendGET(self::API_URL );
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
        $I->canSeeResponseContainsJson([
            'type' => 'number',
            'name' => 'jack_1',
            'is_additive' => '0',
            'is_positive' => '0',
            'is_complex' => '0',
            'interval' => '2592000'
        ]);
    }
}