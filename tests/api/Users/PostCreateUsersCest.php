<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/4/18
 * Time: 4:35 PM
 */

class PostCreateUsersCest
{

//    const API_URL = 'users';


    // tests
    public function tryToTest(ApiTester $I)
    {
        $I->amAuthorized();
        $I->haveHttpHeader("Accept", "application/json");
        $I->haveHttpHeader("X-Company-Id","1");
        $I->sendPOST('users', [
            'X-Company-Id' => '1',
            'username' => 'five',
            'password' => '111111',
            'email' => 'gb5@gmail.com',
            'domain' => 'fit',
            'first_name' => 'one',
            'last_name' => 'one',
            'display_name' => 'one',
            'role_id' => '2'
        ]);
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();

    }

}