<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 3/2/18
 * Time: 6:34 PM
 */

class PostAddComponetsCest
{
    public function tryToTest(\ApiTester $I)
    {
        $name = 'next_SEVEN';

        $I->amAuthorizedByUser();
        $id = $I->amCreateReport($name);
        $I->sendPOST("reports/{$id}/components", [
            //     'id' => '',
            'to' => [
                ['email' => 'user2@test.com']
            ]
        ]);

        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
        $I->canSeeResponseMatchesJsonType([
            "result" => [
                "sent_revisions" => [[
                    "id" => "integer",
                    "created_at" => "integer",
                    "creator_id" => "integer"
                ]]
            ]
        ]);
    }
}