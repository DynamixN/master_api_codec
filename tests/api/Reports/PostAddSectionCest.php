<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 4/6/18
 * Time: 6:01 PM
 */

class PostAddSectionCest
{
    public function tryToTest(\ApiTester $I)
    {
        $name = 'next_EVEN2';

        $I->amAuthorizedByUser();
        $id = $I->amCreateReport($name);
        $I->sendPOST("reports/{$id}/sections", [
              //   'id' => ''
        ]);

        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
        $I->canSeeResponseMatchesJsonType([
            "result" => [
                "report_section_id" => 'integer'
                ]
        ]);
    }
}