<?php
/**
 * Created by PhpStorm.
 * User: hoter.zhang
 * Date: 2019/5/9
 * Time: 上午 08:55
 */

namespace xinyeweb\daterange;


use yii\web\AssetBundle;

class DateRangePickerAsset extends AssetBundle
{

    public $sourcePath = '@bower/bootstrap-daterangepicker';

    public $css = [
        'daterangepicker.css',
    ];
    public $js = [
        'daterangepicker.js',
    ];
    public $publishOptions = [
        'only' => [
            'daterangepicker.css',
            'daterangepicker.js',
        ],
        'except' => [
            'website/'
        ]
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'xinyeweb\daterange\MomentAsset'
    ];

}