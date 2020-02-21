<?php
/**
 * Error.php
 *
 * @author  Carl <morrios@163.com>
 * @ctime   2020/2/21 4:48 下午
 */

namespace Morrios\Base\Constant;


/**
 * Class Error
 *
 * @package Morrios\Base\Constant
 */
class Error
{
    /**
     * Invalid credential
     */
    const INVALID_CREDENTIAL = 'Error.InvalidCredential';

    /**
     * Client Not Found
     */
    const CLIENT_NOT_FOUND = 'Error.ClientNotFound';

    /**
     * Host Not Found
     */
    const HOST_NOT_FOUND = 'Error.HostNotFound';

    /**
     * Server Unreachable
     */
    const SERVER_UNREACHABLE = 'Error.ServerUnreachable';

    /**
     * Invalid Argument
     */
    const INVALID_ARGUMENT = 'Error.InvalidArgument';

    /**
     * Service Not Found
     */

    const SERVICE_NOT_FOUND = 'Error.ServiceNotFound';

    /**
     * Service Unknown Error
     */
    const SERVICE_UNKNOWN_ERROR = 'Error.UnknownError';

    /**
     * Response Empty
     */
    const RESPONSE_EMPTY = 'The response is empty';
}