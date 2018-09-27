<?php
/**
 * Created by PhpStorm.
 * User: duguangyan:15817390700
 * Date: 2018/9/21
 * Time: 17:04
 */

namespace App\Exceptions;


class ApiException extends \Exception
{
    function __construct($msg='')
    {
        parent::__construct($msg);
    }
}