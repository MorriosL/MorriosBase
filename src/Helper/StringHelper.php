<?php
/**
 * StringHelper.php
 *
 * @author  Carl <morrios@163.com>
 * @ctime   2020/2/28 3:30 下午
 */

namespace Morrios\Base\Helper;


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
     */
    public static function random($length = 16): string
    {
        $string = '';

        while (($len = strlen($string)) < $length) {
            $string .= substr(str_replace(['/', '+', '='], '', base64_encode(mt_rand())), 0, $length - $len);
        }

        return $string;
    }
}