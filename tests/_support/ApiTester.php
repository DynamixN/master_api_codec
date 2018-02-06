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
        $this->sendPOST('users/login', ['username'=>'one@sceal.test.gbksoft.net', 'password' => '111111']);
        $this->canSeeResponseCodeIs(200);
        $this->canSeeResponseIsJson();
        $this->amBearerAuthenticated($this->grabDataFromResponseByJsonPath('$.result.token')[0]);
    }

    public function amCreateReport(): int{
        $this->haveHttpHeader("Accept", "application/json");
        $this->sendPOST('reports', [
            'name' => 'next333',
            'due_date' => '1518426000',
            'frequency' => 'month'
        ]);
        return $this->grabDataFromResponseByJsonPath("$.result.id")[0];
//
    }

    public function amCreateMetric(): int{
        $this->haveHttpHeader("Accept", "application/json");
        $this->haveHttpHeader("X-Company-Id","1");
        $this->sendPOST('metrics', [
            'X-Company-Id' => '1',
            'type' => 'number',
            'name' => 'brutto_1',
            'is_additive' => '0',
            'is_positive' => '0',
            'is_complex' => '0',
            'interval' => '2592000'

        ]);
        return $this->grabDataFromResponseByJsonPath("$.result.id")[0];
//
    }
}
