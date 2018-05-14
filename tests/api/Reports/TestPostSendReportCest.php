<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/16/18
 * Time: 2:27 PM
 */

class TestPostSendReportCest
{
    const API_URL = 'reports';

    public function tryToTest(\ApiTester $I)
    {
        $name = 'next_18';


        $I->amAuthorizedByUser();
        $id = $I->amCreateReport($name);
        $I->sendPOST("reports/{$id}/send", [
            //     'id' => '',
            'to' => [
                ['email' => 'gb2@gmail.com']
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
        $I->amAuthorizedByTwo();
        $I->haveHttpHeader("Accept", "application/json");
        $I->sendGET(self::API_URL );
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
        $I->canSeeResponseContainsJson([
            'result' => [
                'revision_id' => 'generate from report'
            ]

        ]);
    }
}