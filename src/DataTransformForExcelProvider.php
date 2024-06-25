<?php

namespace NodeAdmin\DataTransformForExcel;

use Illuminate\Support\ServiceProvider;

class DataTransformForExcelProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../assets' => public_path('node-admin/data-transform-for-excel')
        ], 'laravel-assets');

        $scripts = config('admin.extra_scripts', []);
        $scripts[] = asset('node-admin/data-transform-for-excel/components/data-export.umd.js');
        config()->set('admin.extra_scripts', $scripts);
    }
}
