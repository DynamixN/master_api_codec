<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/4/18
 * Time: 3:43 PM
 */

class GetTaskTypesCest
{
    const API_URL = 'tasks/types';


    // tests
    public function tryToTest(ApiTester $I)
    {
        $I->amAuthorized();
        $I->haveHttpHeader("Accept", "application/json");
        $I->sendGET(self::API_URL );
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
//        $I->canSeeResponseMathesJsonType();

    }
}