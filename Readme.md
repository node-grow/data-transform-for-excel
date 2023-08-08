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
