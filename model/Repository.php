<?php

namespace app\model;
use app\model\entities\DataEntity;
use app\engine\App;

abstract class Repository
{
    protected $db;


    public function __construct()
    {
        $this->db = App::call()->db;
    }

    public function getOne($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE idx = :id";
        return $this->db->queryObject($sql, [":id" => $id], $this->getEntityClass());
    }

    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }

    public function delete(DataEntity $entity)
    {
        $tableName =$this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE idx = :id";
        return $this->db->execute($sql, [":id" => $entity->idx]);
    }

    public function insert(DataEntity $entity)
    {
        $params = [];
        $colums = [];

        foreach ($entity as $key => $value) {
            if ($key == "db" || $key == "idx") continue;
            $colums[] = "`$key`";
            $params[":{$key}"] = $value;
        }

        $colums = implode(", ", $colums);
        $value = implode(", ", array_keys($params));

        $tableName = $this->getTableName();
        $sql = "INSERT INTO {$tableName} ({$colums}) VALUES ({$value})";

        $this->db->execute($sql, $params);

        $this->idx = $this->db->lastInsertId();
    }

    public function save(DataEntity $entity)
    {

        if (is_null($this->idx))
            $this->insert($entity);
        else
            $this->update($entity);
    }



    public function update()
    {
        //TODO изменить данные
        //если успеете, хотя бы подумать
        //это уже если совсем все что выше просто и понятно
    }



    abstract public function getTableName();

    abstract public function getEntityClass();
}