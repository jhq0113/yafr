<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/2/2
 * Time: 8:24 PM
 */

class Db
{
    /**
     * @var string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $dsn;

    /**
     * @var string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $username;

    /**
     * @var string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $password;

    /**
     * @var array
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    protected $_defaultOption = [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
    ];

    /**
     * @var array
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $options= [];

    /**
     * @var \PDO
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    private $_pdo;

    /**
     * @return PDO
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function getPdo()
    {
        if($this->_pdo instanceof \PDO) {
            return $this->_pdo;
        }

        $this->options = array_merge($this->_defaultOption,$this->options);

        $this->_pdo = new \PDO($this->dsn,$this->username,$this->password,$this->options);

        return $this->_pdo;
    }

    /**
     * @param string $sql
     * @param array  $params
     * @return int
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function execute($sql,$params=[])
    {
        //sql注入
        $pdo = $this->getPdo();
        $pdoStatement = $pdo->prepare($sql);
        if(!$pdoStatement) {
            return 0;
        }

        $executeResult = $pdoStatement->execute($params);
        if(!$executeResult) {
            return 0;
        }

        return $pdoStatement->rowCount();
    }

    /**
     * @param string $sql
     * @param array $params
     * @return array
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function query($sql,$params=[])
    {
        //sql注入
        $pdo = $this->getPdo();
        $pdoStatement = $pdo->prepare($sql);
        if(!$pdoStatement) {
            return [];
        }

        $executeResult = $pdoStatement->execute($params);
        if(!$executeResult) {
            return [];
        }

        $rows = $pdoStatement->fetchAll(\PDO::FETCH_ASSOC);
        $pdoStatement->closeCursor();

        return $rows;
    }
}