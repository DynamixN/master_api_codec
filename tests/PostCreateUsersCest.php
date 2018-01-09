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
            'username' => 'onehundred',
            'password' => '111111',
            'email' => 'gb@gmail.com',
            'domain' => 'fit',
            'first_name' => 'Php',
            'last_name' => 'shtorm',
            'display_name' => 'Phpshtorm',
            'role_id' => '2'
        ]);
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
//        $I->canSeeResponseMathesJsonType();

    }

}