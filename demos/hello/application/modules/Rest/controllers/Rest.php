<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/5
 * Time: 7:41 PM
 */

/**
 * Class RestController
 * User Jiang Haiqiang
 */
class RestController extends \extend\ControllerLayout
{
    /**
     * @var string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    protected $_layout = APPLICATION_PATH.'/application/views/layouts/main.phtml';

    public function indexAction()
    {
        exit($this->_module);
    }

    /**
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function routeAction()
    {
        $query['params'] = $this->_request->getParams();
        $query['query'] = $this->_request->getQuery();

        exit(json_encode($query,JSON_UNESCAPED_UNICODE));
    }
}