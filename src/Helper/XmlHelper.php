<?php
/**
 * XmlHelper.php
 *
 * @author  Carl <morrios@163.com>
 * @ctime   2020/2/28 3:30 下午
 */

namespace Morrios\Base\Helper;


/**
 * Class XmlHelper
 *
 * @package Morrios\Base\Helper
 */
class XmlHelper
{
    /**
     * 将array转为xml
     *
     * @param array $array
     * @return string
     */
    public static function arrayToXml(array $array): string
    {
        $xml = '<xml>';
        foreach ($array as $key => $val) {
            if (is_numeric($val)) {
                $xml .= '<' . $key . '>' . $val . '</' . $key . '>';
            } else {
                $xml .= '<' . $key . '><![CDATA[' . $val . ']]></' . $key . '>';
            }
        }
        $xml .= '</xml>';

        return $xml;
    }

    /**
     * 将xml转为array
     *
     * @param string $xml
     * @return array|null
     */
    public static function xmlToArray(string $xml): array
    {
        libxml_disable_entity_loader(true);

        return json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
    }
}