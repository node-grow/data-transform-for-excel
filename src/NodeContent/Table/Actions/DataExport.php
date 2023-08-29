<?php

namespace NodeAdmin\DataTransformForExcel\NodeContent\Table\Actions;

use NodeAdmin\Lib\NodeContent\Table\Actions\Custom;

class DataExport extends Custom
{
    protected $type = 'custom';

    public function __construct($badge = 0)
    {
        parent::__construct($badge);
        $this->setUrl(asset('node-admin/data-transform-for-excel/components/DataExport.umd.min.js'));
        $this->setTitle('数据导出');
    }

    public function setTitle($title)
    {
        $this->render_data['action_option']['title'] = $title;
        return $this;
    }

    public function setDataUrl($url)
    {
        $this->render_data['action_option']['data_url'] = $url;
        return $this;
    }

    public function setConfigUrl($url)
    {
        $this->render_data['action_option']['config_url'] = $url;
        return $this;
    }
}
