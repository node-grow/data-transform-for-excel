# Data Transform For Excel

## 说明

此库为 [node-admin](https://github.com/node-grow/node-admin-lara) 扩展库

## 用法

### 安装

```shell
composer require node-admin/data-transform-for-excel
```

### 表格Action导出

```php
/** @var \NodeAdmin\Lib\NodeContent\Table $table */
$table->actions(function (Table\ActionsContainer $container){
    $export = new DataExport();
    $export->setDataUrl(route('admin.test.export'));
    $container->addAction($export);
});

// export action 
public function export(){
    return Test::query()->paginate();
}
```

### 更新日志

#### 1.1.0

增加配置导出模式

```php
$table->actions(function (Table\ActionsContainer $container){
    $export = new DataExport();
    $export->setDataUrl(route('admin.test.export'));
    $container->addAction($export);
});

// export config
public function exportConfig()
    {
        return new DataExportConfigResponse(
            route('admin.test.export'), // 导出数据url
            // 字段列表 key为字段名,header为表头
            [ 
                ['key' => 'title', 'header' => '标题'],
            ]
        );
    }

// export action 
public function export(){
    return Test::query()->paginate();
}

```
