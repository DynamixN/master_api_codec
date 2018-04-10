<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/11/18
 * Time: 5:36 PM
 */

use \common\services\ReportService;

class PostCreateReportsCest
{
    public function tryToTest(ApiTester $I)
    {
        $I->amAuthorizedByUser();
        $I->haveHttpHeader("Accept", "application/json");
        $I->sendPOST('reports', [
            'name' => 'Gooday',
            'due_date' => '1519030800',
            'frequency' => 'month'
            //       'to' => '[79]'
        ]);
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
        $I->canSeeResponseContainsJson([
            'name' => 'Gooday'
        ]);
        $I->canSeeResponseMatchesJsonType(['result' => [
            'id' => 'integer',
            'name' => 'string',
            'due_date' => 'string',
            'description' => 'string|null',
            'frequency' => 'string|null',
            'repeat_date' => 'integer|null',
            'summary' => 'string|null',
            'template_id' => 'integer|null',
            'auto_create' => 'integer|null',
            "label" => 'array',
            "created_at" => 'integer',
            "updated_at" => 'integer',
            ]]);

    }
}