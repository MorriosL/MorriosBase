<?php
/**
 * BusinessException.php
 *
 * @author  Carl <morrios@163.com>
 * @ctime   2020/2/21 4:50 下午
 */

namespace Morrios\Base\Exception;


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
     */
    public function __construct(string $errorMessage)
    {
        $this->errorMessage = 'Business Error:' . $errorMessage;
        $this->errorCode    = E_ERROR;

        parent::__construct();
    }
}