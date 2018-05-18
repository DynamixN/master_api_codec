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
        $sectionId = $I->amCreateSection($id);
        $I->sendPOST("reports/{$id}/pages", [
            'section_id' => "$sectionId",
            'orientation' => "1"
        ]);

        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
        //$I->canSeeResponseMatchesJsonType([
        //    "result" => [
        //    ]
        //]);
    }
}