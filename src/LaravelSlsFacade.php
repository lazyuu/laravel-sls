<?php

namespace Lazy\LaravelSls;

use Illuminate\Support\Facades\Facade;
use Aliyun\SLS\Client;
use Aliyun\SLS\Models\LogItem;
use Aliyun\SLS\Requests\GetHistogramsRequest;
use Aliyun\SLS\Requests\GetLogsRequest;
use Aliyun\SLS\Requests\ListLogStoresRequest;
use Aliyun\SLS\Requests\ListTopicsRequest;
use Aliyun\SLS\Requests\PutLogsRequest;
use Aliyun\SLS\Responses\GetHistogramsResponse;
use Aliyun\SLS\Responses\GetLogsResponse;
use Aliyun\SLS\Responses\ListLogStoresResponse;
use Aliyun\SLS\Responses\ListTopicsResponse;

/**
 * @see \Lazy\LaravelSls\Skeleton\SkeletonClass
 */
class LaravelSlsFacade extends Facade
{
    /**
     * Class SlSLog
     * @package Lokielse\LaravelSLS\Facades
     * @method ListLogStoresResponse listLogStores($project = null) static
     * @method bool putLogs($data, $topic = null, $source = null, $time = null) static
     * @method ListTopicsResponse listTopics() static
     * @method GetHistogramsResponse getHistograms($from = null, $to = null, $query = null, $topic = null) static
     * @method GetLogsResponse getLogs( $from = null, $to = null, $query = null, $topic = null, $line = 100, $offset = null, $reverse = true) static
     * @method mixed|string getProject() static
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-sls';
    }
}
