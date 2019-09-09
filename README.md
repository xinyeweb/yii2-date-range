yii2-date-range
===============
yii2-date-range

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist xinyeweb/yii2-date-range "*"
```

or add

```
"xinyeweb/yii2-date-range": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?php 
//普通Input
echo \xinyeweb\daterange\DateRangePicker::widget([
                'name' => 'addDate',
                'locale' => 'zh-CN',
                'value' => $addDate,
                'template' => '
                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                         </span>
                        {input}
                    </div>
                ',
                'callback' => 'function() { }'
            ]);
```
```php
<?php
//controller
$addDate = Yii::$app->request->get('addDate', '');
if (!empty($addDate)) {
    $addTime = explode('-', $addDate);
    $starttime = strtotime($addTime[0]);
    $endttime = strtotime($addTime[1])+86400;
    $query->andWhere(['>=', 'created_at', $starttime])
        ->andWhere(['<', 'created_at', $endttime]);
}
```
```php
<?php
//Model
 echo DateRangePicker::widget([
     'model'     => $model,
     'attribute' => 'dateRange',
     
     // Optional. Used for calendar localization. 
     // IF `null` (default), default moment.js language will be used.
     'locale'    => 'ru-RU';
     // Daterange plugin options. Default is `null`.
     // See http://www.daterangepicker.com/#options
     'pluginOptions' => [
         /* ... */
         'autoUpdateInput' => false,
     ],
     // Optional. If maskOptions is set, MaskedInput will be used 
     // instead of TextInput. Default is `null`. 
     'maskOptions' => [
         'mask' => '99/99/9999 - 99/99/9999',
     ],
     // Optional. Input control options, 
     // default is `['class' => 'form-control']`.
     'options' => [
         /* ... */
     ],
     // Optional. Widget template, default is `{input}`. 
     // The special tag `{input}` will be replaced with the form input. 
     'template' => '
         <div class="input-group">
             <span class="input-group-addon">
                 <span class="glyphicon glyphicon-calendar"></span>
              </span>
             {input}
         </div>
     '
     ],
     // Optional. Javascript callback to be passed to the 
     // plugin constructor. By default, updates the input 
     // and triggers `change` event.
     'callback' => 'function() { /* ... */ }';   
     'pluginOptions' => [
          'ranges' => [
              'Today' => [date("Y/m/d", strtotime("today")), date("Y/m/d", strtotime("today"))],
              'Yesterday' => [date("Y/m/d", strtotime("-1 day")), date("Y-m-d", strtotime("-1 day"))],
              'Last 7 Days' => [date("Y/m/d", strtotime("-7 day")), date("Y/m/d", strtotime("today"))],
              'Last 30 Days' => [date("Y/m/d", strtotime("-30 day")), date("Y/m/d", strtotime("today"))],
              'This Month' => [date('Y/m/d', mktime(0, 0, 0, date('m'), '1', date('Y')))],
              'Last Month' => [ date('Y/m/d', strtotime('-1 month')), date("Y/m/d", strtotime(-date('d').'day'))],
          ]
      ],
 ]);
 ?>```
