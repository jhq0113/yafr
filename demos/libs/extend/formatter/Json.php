<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/13
 * Time: 1:33 PM
 */

namespace extend\formatter;

use extend\IFormatter;

/**
 * Class Json
 * @package extend\formatter
 * User Jiang Haiqiang
 */
class Json extends IFormatter
{
    /**
     * @param array $data
     * @return false|mixed|string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function convert(array $data = [])
    {
        // TODO: Implement convert() method.
        return json_encode($data,JSON_UNESCAPED_UNICODE);
    }
}