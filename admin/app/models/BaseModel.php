<?php

namespace App\Models;

use PDO;

class BaseModel
{
    protected $pdo = NULL;
    protected $sql = '';
    protected $sta = NULL;

    public function __construct()
    {
        //set connect
        $this->pdo =  new PDO(
            "mysql:host=" . DBHOST
                . ";dbname=" . DBNAME
                . ";charset=" . DBCHARSET,
            DBUSER,
            DBPASS
        );
    }
    // neu ko truyen gi thi se dung cho cau lenh select
    // neu truyen false thi danh cho cau lenh them sua
    public function getData($query, $getAll = true)
    {
        //  $conn = getConnect();

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        if ($getAll) {
            return $stmt->fetchAll();
        }

        return $stmt->fetch();
    }
    public function setQuery($sql)
    {
        $this->sql = $sql;
    }

    //Function execute the query
    // hàm này sẽ làm hàm chạy câu truy vấn
    public function execute($options = array())
    {
        $this->sta = $this->pdo->prepare($this->sql);
        if ($options) {  //If have $options then system will be tranmission parameters
            for ($i = 0; $i < count($options); $i++) {
                $this->sta->bindParam($i + 1, $options[$i]);
            }
        }
        $this->sta->execute();
        return $this->sta;
    }

    //Funtion load datas on table
    // lấy nhiều dữ liệu ở trong bảng
    public function loadAllRows($options = array())
    {
        if (!$options) {
            if (!$result = $this->execute())
                return false;
        } else {
            if (!$result = $this->execute($options))
                return false;
        }
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    //Funtion load 1 data on the table
    //lay 1 du lieu thoi
    public function loadRow($option = array())
    {
        if (!$option) {
            if (!$result = $this->execute())
                return false;
        } else {
            if (!$result = $this->execute($option))
                return false;
        }
        return $result->fetch(PDO::FETCH_OBJ);
    }

    //Function count the record on the table
    public function loadRecord($option = array())
    {
        if (!$option) {
            if (!$result = $this->execute())
                return false;
        } else {
            if (!$result = $this->execute($option))
                return false;
        }
        return $result->fetch(PDO::FETCH_COLUMN);
    }

    public function getLastId()
    {
        return $this->pdo->lastInsertId();
    }

    public function disconnect()
    {
        $this->sta = NULL;
        $this->pdo = NULL;
    }
}
?>