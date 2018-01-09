<?php


class GetUsersCest
{
    const API_URL = 'reports';

    // tests
    public function tryToTest(ApiTester $I)
    {
        $I->haveHttpHeader("Accept", "application/json");
        $I->sendGet(self::API_URL, ['username'=>'Abg@sceal.test.gbksoft.net', 'password' => 'qwerty12']);
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();

        $I->amBearerAuthenticated($I->grabDataFromResponseByJsonPath("$.result.token")[0]);

    }
}
