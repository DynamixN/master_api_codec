<?php
namespace common\services;

class ReportService
{
    public static function reportFields()
    {
        return [
            'result' => [
                'id' => 'integer',
                'name' => 'string',
                'due_date' => 'integer',
                'is_' => 'integer',
                'description' => 'string',
                'frequency' => 'string',
                'repeat_date' => 'integer',
                'summary'=> 'string',
                'template_id' => 'integer',
                'auto_create' => 'integer',
                "label" => '',
                "created_at" => 'integer',
                "updated_at" => 'integer',
            ]
        ];
    }
}