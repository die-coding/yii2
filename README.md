# Yii2 Core

Tidak ada dokumentasi, karena hanya untuk tambahan internal Die Coding saja ^_^


[![Latest Version](https://img.shields.io/github/release/die-coding/yii2-core.svg?style=flat-square)](https://github.com/die-coding/yii2-core/releases)
[![Software License](https://img.shields.io/badge/license-BSD-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Quality Score](https://img.shields.io/scrutinizer/g/die-coding/yii2-core.svg?style=flat-square)](https://scrutinizer-ci.com/g/die-coding/yii2-core)
[![Total Downloads](https://img.shields.io/packagist/dt/diecoding/yii2-core.svg?style=flat-square)](https://packagist.org/packages/diecoding/yii2-core)

## Cara Memasang

* Melalui console

```
composer require --prefer-dist diecoding/yii2-core "dev-master"
```

* Melalui `composer.json`

1. Tambahkan pada baris `require`

```
"diecoding/yii2-core": "dev-master"
```

2. Kemudian jalankan

```
composer update
```

3. Optional
```
php yii migrate --migrationPath=@yii/rbac/migrations
php yii migrate --migrationPath=@diecoding/rbac/migrations
php yii migrate --migrationPath=@diecoding/migrations
```

```php

// BS4
\yii\bootstrap4\Modal::begin([
    "id"      => "ajaxCrudModal",
    "title"   => "",
    "footer"  => "",
]);

\yii\bootstrap4\Modal::end();

// BS3
\yii\bootstrap\Modal::begin([
    "id"      => "ajaxCrudModal",
    "title"   => "",
    "footer"  => "",
]);

\yii\bootstrap\Modal::end();

```


## List Class

```php
\diecoding\behaviors\TouchDbBehavior();

\diecoding\behaviors\TouchDbBehavior();


\diecoding\helpers\Date();

\diecoding\DiecodingAsset::register($this);
```


## List Package

```
"yiisoft/yii2-httpclient": "^2.0.0",
"yiisoft/yii2-imagine": "~2.2.0",
"yiisoft/yii2-authclient": "~2.1.0",
"yiisoft/yii2-bootstrap4": "@dev",

"vlucas/phpdotenv": "*",

"kartik-v/yii2-widgets": "dev-master",
"kartik-v/yii2-mpdf": "dev-master",
"kartik-v/yii2-datecontrol": "dev-master",
"kartik-v/yii2-date-range": "dev-master",
"kartik-v/yii2-export": "*",
"kartik-v/yii2-dialog": "*",
"kartik-v/yii2-field-range": "*",
"kartik-v/yii2-bootstrap4-dropdown": "dev-master",
"kartik-v/yii2-icons": "@dev",
"kartik-v/yii2-detail-view": "dev-master",
"kartik-v/yii2-money": "dev-master",

"skeeks/yii2-mobile-detect": "^1.0.2",

"2amigos/yii2-tinymce-widget": "*",

"phpoffice/phpspreadsheet": "*",
"phpoffice/phpexcel": "*",

"sizeg/yii2-jwt": "^2.0",

"longman/telegram-bot": "*",
"php-telegram-bot/telegram-bot-manager": "^1.4",

"wbraganca/yii2-dynamicform": "*",

"borales/yii2-phone-input": "*",

"diecoding/yii2-rbac": "@dev",
"diecoding/yii2-toastr": "@dev"
```