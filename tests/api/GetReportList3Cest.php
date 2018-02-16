<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/19/17
 * Time: 4:23 PM
 */
use \Fixtures\UserFixtures as User;

class GetReportList3Cest
{
    const API_URL = 'reports';

    // tests
    public function tryToTest(ApiTester $I, User $user)
    {
        $I->amAuthorizedByUser();
        $I->haveHttpHeader("Accept", "application/json");
        $I->sendGET(self::API_URL );
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
  //      $I->canSeeResponseContainsJson([
  //          'type' => '2'
  //      ]);

    }
}