<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/21/18
 * Time: 3:59 PM
 */

class TestFlowAddCreateReportAddSecPagCompCest
{
    public function tryToTest(\ApiTester $I)
    {
        $name = 'next_SE35';

        $I->amAuthorizedByUser();
        $id = $I->amCreateReport($name);
        $sectionId = $I->amCreateSection($id);
        $I->sendPOST("reports/{$id}/pages", [
            'section_id' => "$sectionId",
            'orientation' => "1"
        ]);
        $I->sendPOST("reports/{$id}/components", [
            'id' => '',
            'report_page_id' =>
        ]);

        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
        //$I->canSeeResponseMatchesJsonType([
        //    "result" => [
        //    ]
        //]);
    }
}