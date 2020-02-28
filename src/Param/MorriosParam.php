<?php
/**
 * MorriosParam.php
 *
 * @author  Carl <morrios@163.com>
 * @ctime   2020/2/24 12:01 下午
 */

namespace Morrios\Base\Param;


/**
 * Class MorriosParam
 *
 * @package Morrios\Base\Param
 */
class MorriosParam
{
    /**
     * @var array
     */
    protected $originData;

    /**
     * @var array
     */
    protected $filterProperties = ['originData', 'filterProperties'];

    /**
     * MorriosParam constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->originData = $data;

        $this->initByArray();
    }

    /**
     * initByArray
     */
    protected function initByArray()
    {
        foreach ($this as $property => $value) {
            if (!in_array($property, $this->filterProperties)) $this->$property = $this->originData[$property] ?? $value;
        }
    }

    /**
     * toArray
     *
     * @return array
     */
    public function toArray()
    {
        $data = [];

        foreach ($this as $property => $vale) {
            if (!in_array($property, $this->filterProperties)) $data[$property] = $vale;
        }

        return $data;
    }
}