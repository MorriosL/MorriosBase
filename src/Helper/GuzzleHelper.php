<?php
/**
 * GuzzleHelper.php
 *
 * @author  Carl <morrios@163.com>
 * @ctime   2020/2/24 1:47 下午
 */

namespace Morrios\Base\Helper;


use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
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
     * @param string            $baseUri
     * @param HandlerStack|null $handler
     */
    private function __construct(string $baseUri, HandlerStack $handler)
    {
        $config = ['base_uri' => $baseUri];
        if ($handler) $config['handler'] = $handler;

        $this->client = new Client($config);
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
     * @param string            $baseUri
     * @param HandlerStack|null $handler
     * @return GuzzleHelper
     */
    public static function instance(string $baseUri, HandlerStack $handler = null): GuzzleHelper
    {
        $instanceKey = md5($baseUri);

        if (!(self::$instances[$instanceKey] ?? null) instanceof GuzzleHelper) {
            self::$instances[$instanceKey] = new self($baseUri, $handler);
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
     * @param array        $headers
     * @return array|string
     */
    public function post(string $uri, $params = [], array $query = [], array $headers = [])
    {
        $responseInterface = $this->client->post($uri, [
            $this->paramsType => $params,
            'query'           => $query,
            'headers'         => $headers,
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