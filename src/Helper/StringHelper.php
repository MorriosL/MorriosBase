<?php
/**
 * StringHelper.php
 *
 * @author  Carl <morrios@163.com>
 * @ctime   2020/2/28 3:30 下午
 */

namespace Morrios\Base\Helper;


use Exception;

/**
 * Class StringHelper
 *
 * @package Morrios\Base\Helper
 */
class StringHelper
{
    /**
     * 生成随机字符串
     *
     * @param int $length
     * @return string
     * @throws Exception
     */
    public static function random($length = 16)
    {
        $string = '';

        while (($len = strlen($string)) < $length) {
            $size = $length - $len;

            $bytes = function_exists('random_bytes') ? random_bytes($size) : mt_rand();

            $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
        }

        return $string;
    }
}