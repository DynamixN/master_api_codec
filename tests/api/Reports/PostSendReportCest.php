<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/22/18
 * Time: 6:03 PM
 */

class PostSendReportCest
{
    public function tryToTest(\ApiTester $I)
    {
        $name = 'next_SEVEN';

        $I->amAuthorizedByUser();
        $id = $I->amCreateReport($name);
        $I->sendPOST("reports/{$id}/send", [
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