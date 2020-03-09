<?php
/**
 * ParameterException.php
 *
 * @author  Carl <morrios@163.com>
 * @ctime   2020/3/9 3:08 下午
 */

namespace Morrios\Base\Exception;


/**
 * Class ParameterException
 *
 * @package Morrios\Base\Exception
 */
class ParameterException extends MorriosException
{
    /**
     * ParameterException constructor.
     *
     * @param string $errorMessage
     */
    public function __construct(string $errorMessage)
    {
        $this->errorMessage = 'Parameter Error:' . $errorMessage;
        $this->errorCode    = E_ERROR;

        parent::__construct();
    }
}