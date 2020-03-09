<?php
/**
 * MorriosException.php
 *
 * @author  Carl <morrios@163.com>
 * @ctime   2020/2/21 4:17 下午
 */

namespace Morrios\Base\Exception;


use Exception;
use Throwable;

/**
 * Class MorriosException
 *
 * @package Morrios\Base\Exception
 */
class MorriosException extends Exception
{
    /**
     * @var int
     */
    protected $errorCode;

    /**
     * @var string
     */
    protected $errorMessage;

    /**
     * MorriosException constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct($this->getErrorMessage(), $this->getErrorCode(), $previous);
    }

    /**
     * getErrorCode
     *
     * @return int
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