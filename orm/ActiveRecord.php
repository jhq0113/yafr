<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/2/2
 * Time: 8:50 PM
 */

class ActiveRecord
{
    /**
     * @var string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $tableName;

    /**
     * @var Db
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $db;

    /**
     * @param array $rows
     * @return int
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function insert(array $rows)
    {
        $fields = [];
        $places = [];
        $params = [];

        foreach ($rows as $field => $value){
            array_push($fields,'`'.$field.'`');
            array_push($places,':'.$field);
            $params[':'.$field] = $value;
        }

        $sql = 'INSERT INTO `'.$this->tableName.'`('.implode(',',$fields).')VALUES('.implode(',',$places).')';

        $count = $this->db->execute($sql,$params);
        if($count === 1) {
            return $this->db->getPdo()->lastInsertId();
        }
    }

    /**
     * @param array $rows
     * @return int
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function multiInsert(array $rows)
    {
        $fields = [];
        $places = [];
        $params = [];

        $num = 1;
        foreach ($rows as $row) {
            $place =[];
            foreach ($row as $field => $value) {
                if($num === 1) {
                    array_push($fields,'`'.$field.'`');
                }
                array_push($place,':'.$field.$num);
                $params[':'.$field.$num] = $value;
            }
            array_push($places,'('.implode(',',$place).')');
            $num++;
        }
        $sql = 'INSERT INTO `'.$this->tableName.'`('.implode(',',$fields).')VALUES'.implode(',',$places);
        return $this->db->execute($sql,$params);
    }

    /**
     * @param array|string $sets
     * @param array|string $where
     * @return int
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function update($sets,$where)
    {
        if(is_array($sets)) {
            $newSets = [];
            foreach ($sets as $field => $value) {
                array_push($newSets,'`'.$field.'`=\''.$value.'\'');
            }
            $sets = implode(',',$newSets);
        }

        if(is_array($where)) {
            $newWhere = [];
            foreach ($where as $field => $value) {
                if(is_array($value)) {
                    array_push($newWhere,'`'.$field.'` IN('.implode(',',$value).')');
                }else {
                    array_push($newWhere,'`'.$field.'`=\''.$value.'\'');
                }
            }
            $where = implode(' AND ',$newWhere);
        }

        $sql = 'UPDATE `'.$this->tableName.'` SET '.$sets.' WHERE '.$where;
        return $this->db->execute($sql);
    }

    /**
     * @param array|string $where
     * @return int
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function delete($where)
    {
        if(is_array($where)) {
            $newWhere = [];
            foreach ($where as $field => $value) {
                if(is_array($value)) {
                    array_push($newWhere,'`'.$field.'` IN('.implode(',',$value).')');
                }else {
                    array_push($newWhere,'`'.$field.'`=\''.$value.'\'');
                }
            }
            $where = implode(' AND ',$newWhere);
        }

        $sql = 'DELETE FROM `'.$this->tableName.'` WHERE '.$where;
        return $this->db->execute($sql);
    }

    /**
     * @param $where
     * @param $fields
     * @param string $group
     * @param string $order
     * @param array  $limit
     * @return array
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function select($where,$fields='',$group='',$order='',$limit)
    {
        $select = '*';
        if(!empty($fields)) {
            $select = implode(',',$fields);
        }

        $groupBy = '';
        if(!empty($group)) {
            $groupBy = ' GROUP BY '.implode(',',$group);
        }

        $orderBy = '';
        if(!empty($order)) {
            $newOrder = [];
            foreach($order as $field=>$sort) {
                array_push($newOrder,'`'.$field.'` '.$sort);
            }
            $orderBy = ' ORDER BY '.implode(',',$newOrder);
        }

        if(is_array($where)) {
            $newWhere = [];
            foreach ($where as $field => $value) {
                if(is_array($value)) {
                    array_push($newWhere,'`'.$field.'` IN('.implode(',',$value).')');
                }else {
                    array_push($newWhere,'`'.$field.'`=\''.$value.'\'');
                }
            }
            $where = ' WHERE '.implode(' AND ',$newWhere);
        }

        if(!empty($limit)) {
            if(is_array($limit)) {
                $limit = (string)$limit['offset'].','.$limit['number'];
            }else {
                $limit = (string)$limit;
            }
        }else{
            $limit = '1000';
        }

        $sql = 'SELECT '.$select.' FROM `'.$this->tableName.'` '.$where.$groupBy.$orderBy.' LIMIT '.$limit;
        return $this->db->query($sql);
    }
}