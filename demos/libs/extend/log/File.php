<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/13
 * Time: 1:19 PM
 */

namespace extend\log;

use extend\Di;
use extend\formatter\Json;
use extend\helpers\HttpHelper;
use extend\helpers\StringHelper;
use extend\ILog;

/**
 * Class File
 * @package extend\log
 * User Jiang Haiqiang
 */
class File extends ILog
{
    /**
     * @var string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $fileName;

    /**
     * @var int
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $mode=0755;

    /**
     * @param mixed $level
     * @param string $message
     * @param array $context
     * @return null|void
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function log($level, $message, array $context = array())
    {
        if(!in_array($level,$this->acceptLevels)) {
            return;
        }

        // TODO: Implement log() method.
        $dir = dirname($this->fileName);

        if(!is_dir($dir)) {
            mkdir($dir,$this->mode,true);
        }

        $message = StringHelper::interpolate($message,$context);

        $data = [
            'message'  => $message,
            'level'    => $level,
            'datetime' => date('Y-m-d H:i:s'),
            'clientIp' => HttpHelper::getClientIp(),
            'traceId'  => HttpHelper::getTraceId()
        ];

        $file = @fopen($this->fileName,'a');

        if($file) {
            $this->format = Di::insure($this->format,Json::class);

            @fwrite($file,$this->format->convert($data).PHP_EOL);
            @chmod($this->fileName,$this->mode);
            @fclose($file);
        }
    }
}