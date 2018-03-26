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
    use \Fixtures\FixturesTrait;

    public function _amAuthorized(string $user, string $domain)
    {
        $this->haveHttpHeader("Accept", "application/json");
        $this->sendPOST('users/login', ['username'=>$user.'@'. $domain, 'password' => '111111']);
        $this->canSeeResponseCodeIs(200);
        $this->canSeeResponseIsJson();
        $this->amBearerAuthenticated($this->grabDataFromResponseByJsonPath('$.result.token')[0]);
    }

    public function amAuthorizedByUser()
    {
        $user = new \Fixtures\UserFixtures();

        $this->_amAuthorized($user->get('user')['username'], $this->getCustomParam());
    }
    public function amAuthorizedByTwo()
    {
        $user = new \Fixtures\UserFixtures();

        $this->_amAuthorized($user->get('two')['username'], $this->getCustomParam());
    }

    public function amAuthorizedByAdmin()
    {
        $user = new \Fixtures\UserFixtures();

        $this->_amAuthorized($user->get('admin')['username'], $this->getCustomParam());
    }

    public function amCreateReport(string $name): int{
        $this->haveHttpHeader("Accept", "application/json");
        $this->sendPOST('reports', [
            'name' => "$name",
            'due_date' => '1523523600',
            'frequency' => 'month'
        ]);
        return $this->grabDataFromResponseByJsonPath("$.result.id")[0];
//
    }

    public function amCreateMetric(string $name_m): int{
        $this->haveHttpHeader("Accept", "application/json");
        $this->haveHttpHeader("X-Company-Id","1");
        $this->sendPOST('metrics', [
            'X-Company-Id' => '1',
            'type' => 'number',
            'name' => "$name_m",
            'is_additive' => '0',
            'is_positive' => '0',
            'is_complex' => '0',
            'interval' => '2592000'

        ]);
        return $this->grabDataFromResponseByJsonPath("$.result.id")[0];
//
    }
}
