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
        $I->amAuthorized();
        $id = $I->amCreateReport();
        $I->sendPOST("reports/{$id}/send", [
     //     'id' => '',
            'To' => [
                'email' => 'gb4@gmail.com'
            ]
        ]);

        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();

    }
}