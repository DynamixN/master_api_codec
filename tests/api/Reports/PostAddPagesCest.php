<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 3/16/18
 * Time: 6:03 PM
 */

class PostAddPagesCest
{
    public function tryToTest(\ApiTester $I)
    {
        $name = 'next_SEVa';

        $I->amAuthorizedByUser();
        $id = $I->amCreateReport($name);
        $I->sendPOST("reports/{$id}/pages", [
            //     'id' => '',
            'section_id' => "",
            'orientation' => "0"
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