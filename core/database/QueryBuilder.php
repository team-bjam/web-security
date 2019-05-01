<?php

namespace App\Core\Database;

use PDO;

class QueryBuilder
{
    /**
     * The PDO instance.
     *
     * @var PDO
     */
    protected $pdo;

    /**
     * Create a new QueryBuilder instance.
     *
     * @param PDO $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Select all records from a database table.
     *
     * @param string $table
     */
    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Select records with where condition from a database table.
     */
    public function selectWhere($table, $conditions) {

        $where_clauses = $this->getPairs($conditions);

        $sql = sprintf(
            'select * from %s where %s',
            $table,
            implode(' AND ', $where_clauses) 
        );
        
        try {

            $statement = $this->pdo->prepare($sql);

            $statement->execute($conditions);

            return $statement->fetchAll(PDO::FETCH_OBJ);

        } catch (\Exception $e) {
        
        }
        
    }

    /**
     * Insert a record into a table.
     *
     * @param  string $table
     * @param  array  $parameters
     */
    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);

            return $this->pdo->lastInsertId();

        } catch (\Exception $e) {
            //
        }
    }

    public function findById($table, $id)
    {
        try {
            $sql = sprintf(
                'select * from (%s) where id = :id',
                $table
            );

            $statement = $this->pdo->prepare($sql);

            $statement->execute([
                'id'    => $id
            ]);

            return $statement->fetch(PDO::FETCH_OBJ);

        } catch (\Exception $e) {
            //
        }
    }

    public function update($table, $parameters, $conditions)
    {
        $where_clauses = $this->getPairs($conditions);
        $values_to_update = $this->getPairs($parameters);

        $sql = sprintf(
            'update %s set %s where %s',
            $table,
            implode(', ', $values_to_update),
            implode(' AND ', $where_clauses)
        );
        
        try {

            $statement = $this->pdo->prepare($sql);

            $statement->execute(array_merge($parameters, $conditions));

            return $statement->fetchAll(PDO::FETCH_OBJ);

        } catch (\Exception $e) {
        
        }
    }

    private function getPairs(array $set)
    {
        $set_keys = array_keys($set);
        $pairs = [];
        foreach($set_keys as $key) {
            $pairs[] = "{$key} = :{$key}";
        }
        return $pairs;
    }
}
