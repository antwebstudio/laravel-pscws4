<?php
/**
 * Created by PhpStorm.
 * User: myron
 * Date: 2019/7/9
 * Time: 下午4:21
 */
namespace Mecyu\LaravelPscws4\Facades;

use Illuminate\Support\Facades\Facade;

class PSCWS4 extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PSCWS4';
    }
}