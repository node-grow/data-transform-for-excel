<?php

namespace NodeAdmin\DataTransformForExcel\Http\Responses;

use NodeAdmin\Lib\NodeContent\NodeResponse;

class DataExportConfigResponse extends NodeResponse
{
    /**
     * @param string $data_url
     * @param array $columns [header: string, key: string][]
     */
    public function __construct(string $data_url, array $columns)
    {
        parent::__construct([
            'data_url' => $data_url,
            'columns' => $columns,
        ], '');
    }
}
