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
        $name = 'liver';

        $I->amAuthorizedByUser();
        $id = $I->amCreateReport($name);
        $I->haveHttpHeader("Accept", "application/json");
        $I->sendPOST("comments/report/{$id}", [
            'message' => 'Gooday2'
        ]);
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
        $I->canSeeResponseContainsJson([
            "result" => [
                "message" => "Gooday2"
            ]
        ]);
    }
}