<?php
/**
 * GuzzleHelper.php
 *
 * @author  Carl <morrios@163.com>
 * @ctime   2020/2/24 1:47 下午
 */

namespace Morrios\Base\Helper;


use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Class GuzzleHelper
 *
 * @package Morrios\Base\Helper
 */
class GuzzleHelper
{
    /**
     * @var GuzzleHelper[]
     */
    protected static $instances;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $paramsType = 'form_params';

    /**
     * Request constructor.
     *
     * @param string $baseUri
     */
    private function __construct(string $baseUri)
    {
        $this->client = new Client(['base_uri' => $baseUri]);
    }

    /**
     * __clone
     */
    private function __clone()
    {
    }

    /**
     * instance
     *
     * @param string $baseUri
     * @return GuzzleHelper
     */
    public static function instance(string $baseUri)
    {
        $instanceKey = md5($baseUri);

        if (!(self::$instances[$instanceKey] ?? null) instanceof GuzzleHelper) {
            self::$instances[$instanceKey] = new self($baseUri);
        }

        return self::$instances[$instanceKey];
    }

    /**
     * setParamsType
     *
     * @param string $paramsType
     * @return void
     */
    public function setParamsType(string $paramsType)
    {
        $this->paramsType = $paramsType;
    }

    /**
     * get
     *
     * @param string $uri
     * @param array  $params
     * @return array|string
     */
    public function get(string $uri, array $params = [])
    {
        $response = $this->client->get($uri, [
            'query' => $params,
        ]);

        return $this->_parseResponse($response);
    }

    /**
     * post
     *
     * @param string       $uri
     * @param array|string $params
     * @param array        $query
     * @return array|string
     */
    public function post(string $uri, $params = [], array $query = [])
    {
        $responseInterface = $this->client->post($uri, [
            $this->paramsType => $params,
            'query'           => $query,
        ]);

        return $this->_parseResponse($responseInterface);
    }

    /**
     * _parseResponse
     *
     * @param ResponseInterface $responseInterface
     * @return array|string
     */
    private function _parseResponse(ResponseInterface $responseInterface)
    {
        $content = $responseInterface->getBody()->getContents();

        $jsonContent = json_decode($content, true);

        return $jsonContent ?? $content;
    }
}