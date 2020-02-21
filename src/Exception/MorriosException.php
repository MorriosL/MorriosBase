<?php
/**
 * MorriosException.php
 *
 * @author  Carl <morrios@163.com>
 * @ctime   2020/2/21 4:17 下午
 */

namespace Morrios\Base\Exception;


use Exception;

/**
 * Class MorriosException
 *
 * @package Morrios\Base\Exception
 */
class MorriosException extends Exception
{
    /**
     * @var string
     */
    protected $errorCode;

    /**
     * @var string
     */
    protected $errorMessage;

    /**
     * getErrorCode
     *
     * @return string
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * getErrorMessage
     *
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }
}