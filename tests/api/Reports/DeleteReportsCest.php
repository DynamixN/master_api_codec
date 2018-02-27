<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/20/18
 * Time: 4:04 PM
 */

class DeleteReportsCest
{
    public function tryToTest(\ApiTester $I)
    {
        $I->amAuthorizedByUser();
        $id = $I->amCreateReport();
        $I->sendDELETE("reports/{$id}");
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
    }
}