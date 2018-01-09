<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/
class ApiTester extends \Codeception\Actor
{
    use _generated\ApiTesterActions;

    public function amAuthorized()
    {
        $this->haveHttpHeader("Accept", "application/json");
        $this->sendPOST('users/login', ['username'=>'nata@sceal.test.gbksoft.net', 'password' => '123456']);
        $this->canSeeResponseCodeIs(200);
        $this->canSeeResponseIsJson();
        $this->amBearerAuthenticated($this->grabDataFromResponseByJsonPath('$.result.token')[0]);
    }
}
