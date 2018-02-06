<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/11/18
 * Time: 5:36 PM
 */

class PostCreateReportsCest
{
    public function tryToTest(ApiTester $I)
    {
        $I->amAuthorized();
        $I->haveHttpHeader("Accept", "application/json");
        $I->sendPOST('reports', [
            'name' => 'next_2',
            'due_date' => '1516381200',
            'frequency' => 'month',
            'to' => '[79]'
        ]);
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
//        $I->canSeeResponseMathesJsonType();

    }
}