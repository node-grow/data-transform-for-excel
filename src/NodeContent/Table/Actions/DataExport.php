<?php

namespace NodeAdmin\DataTransformForExcel\NodeContent\Table\Actions;

use NodeAdmin\Lib\NodeContent\Table\Actions\BaseAction;

class DataExport extends BaseAction
{
    protected $type = 'data_export';

    public function __construct()
    {
        parent::__construct();
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
