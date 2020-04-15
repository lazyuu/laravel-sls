# Aliyun SLS Log For Laravel

# 说明
**此包来源于 [lokielse/laravel-sls](https://github.com/lokielse/laravel-sls)**

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

## 安装

You can install the package via composer:

```bash
composer require lazy/laravel-sls
```

## 配置
Publish `sls.php` to `config` folder
```sh
php artisan vendor:publish --provider="Lokielse\LaravelSLS\LaravelSLSServiceProvider" 
```

Edit your `.env` file

```bash
ALIYUN_ACCESS_KEY_ID=...
ALIYUN_ACCESS_KEY_SECRET=...
# https://help.aliyun.com/document_detail/29008.html
# 如杭州公网 cn-hangzhou.log.aliyuncs.com
# 如杭州内网 cn-hangzhou-intranet.log.aliyuncs.com
SLS_ENDPOINT=cn-hangzhou.log.aliyuncs.com
SLS_PROJECT=test-project
SLS_STORE=test-store
```

## 使用

First create a project and store at [Aliyun SLS Console](https://sls.console.aliyun.com/)

Then update `SLS_ENDPOINT`, `SLS_PROJECT`, `SLS_STORE` in `.env`

Push a test message to queue

```php
Log::info('Test Message', ['foobar'=>'2003']);

//or you can use `app('sls')` 

app('sls')->putLogs([
	'type' => 'test',
	'message' => json_encode(['This should use json_encode'])
]);

//or you can use `SLSLog` directly 

SLSLog::putLogs([
	'type' => 'test',
	'message' => json_encode(['This should use json_encode'])
]);
```