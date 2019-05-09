<?php
/**
 * Created by PhpStorm.
 * User: hoter.zhang
 * Date: 2019/5/9
 * Time: 上午 08:57
 */

namespace xinyeweb\daterange;


use yii\web\AssetBundle;

class MomentAsset extends AssetBundle
{

    /**
     * @var string locale for moment.js
     */
    public static $locale;
    public $sourcePath = '@bower/moment';
    public $publishOptions = [
        'only' => [
            'min/*.js',
            'locale/*.js',
            'moment.js'
        ],
        'except' => [
            'src/',
            'templates/',
            'min/tests.js'
        ]
    ];
    public function init()
    {
        $this->js[] = (YII_DEBUG) ? 'moment.js' : 'min/moment.min.js';

        $localePath = \Yii::getAlias($this->sourcePath . DIRECTORY_SEPARATOR . 'locale');
        if (isset(static::$locale)) {
            $locale = strtolower(static::$locale);
            $fallbackLocale = substr($locale, 0, 2);
            if (is_file($localePath . DIRECTORY_SEPARATOR . $locale . '.js')) {
                $this->js[] = "locale/{$locale}.js";
            } elseif ($locale != $fallbackLocale
                && (is_file($localePath . DIRECTORY_SEPARATOR . $fallbackLocale . '.js'))) {
                $this->js[] = "locale/{$fallbackLocale}.js";
            }
        }
    }
}