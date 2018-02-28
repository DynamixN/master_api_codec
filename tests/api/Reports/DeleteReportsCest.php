<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/20/18
 * Time: 4:04 PM
 */

class DeleteReportsCest
{
    const API_URL = 'reports';

    public function tryToTest(\ApiTester $I)
    {
        $name = "Stamp";

        $I->amAuthorizedByUser();
        $id = $I->amCreateReport($name);
        $I->sendDELETE("reports/{$id}");
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
        $I->sendGET(self::API_URL );
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
        $I->dontSeeResponseContainsJson([
            'name' => $name
        ]);
    }
}