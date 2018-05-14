<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/8/18
 * Time: 5:40 PM
 */

class PostAddCommentsCest
{
    public function tryToTest(ApiTester $I)
    {
        $I->amAuthorizedByUser();
        $I->haveHttpHeader("Accept", "application/json");
        $I->sendPOST('/comments/report/385', [
            'message' => 'Gooday'
        ]);
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
        $I->canSeeResponseContainsJson([
            'message' => 'Gooday'
        ]);

    }
}