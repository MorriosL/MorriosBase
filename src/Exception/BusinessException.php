<?php
/**
 * BusinessException.php
 *
 * @author  Carl <morrios@163.com>
 * @ctime   2020/2/21 4:50 下午
 */

namespace Morrios\Base\Exception;


use Morrios\Base\Constant\Error;

/**
 * Class BusinessException
 *
 * @package Morrios\Base\Exception
 */
class BusinessException extends MorriosException
{
    /**
     * BusinessException constructor.
     *
     * @param string $errorMessage
     * @param string $errorCode
     */
    public function __construct($errorMessage = Error::RESPONSE_EMPTY, $errorCode = Error::SERVICE_UNKNOWN_ERROR)
    {
        $this->errorMessage = $errorMessage;
        $this->errorCode    = $errorCode;

        parent::__construct($this->getErrorMessage(), $this->getErrorCode());
    }
}