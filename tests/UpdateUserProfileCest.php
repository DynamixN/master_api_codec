<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/26/18
 * Time: 5:08 PM
 */

class UpdateUserProfileCest
{
    public function tryToTest(ApiTester $I)
    {
        $I->amAuthorized();
        $I->haveHttpHeader("Accept", "application/json");
        $I->haveHttpHeader("X-Company-Id","1");
        $I->sendPOST('users/profile', [
            'X-Company-Id' => '1',
            'username' => 'three',
            'password' => '111111',
            'email' => 'gb3@gmail.com',
            'domain' => 'fit',
            'first_name' => 'three',
            'last_name' => 'three',
            'display_name' => 'three',
            'role_id' => '2'
        ]);
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();

    }
}