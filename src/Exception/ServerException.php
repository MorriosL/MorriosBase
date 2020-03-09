<?php
/**
 * ServerException.php
 *
 * @author  Carl <morrios@163.com>
 * @ctime   2020/3/2 5:14 下午
 */

namespace Morrios\Base\Exception;


/**
 * Class ServerException
 *
 * @package Morrios\Base\Exception
 */
class ServerException extends MorriosException
{
    /**
     * ServerException constructor.
     *
     * @param string $errorMessage
     */
    public function __construct(string $errorMessage)
    {
        $this->errorMessage = 'Server Error:' . $errorMessage;
        $this->errorCode    = E_ERROR;

        parent::__construct();
    }
}