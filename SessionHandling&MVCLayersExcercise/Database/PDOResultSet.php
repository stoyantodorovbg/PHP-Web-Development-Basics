<?php

namespace Database;


class PDOResultSet implements ResultSetInterface
{
    /**
     * @var \PDOStatement
     */
    private $pdoStatement;

    /**
     * PDOPreparedStatement constructor.
     * @param \PDOStatement $pdoStatement
     */
    public function __construct(\PDOStatement $pdoStatement)
    {
        $this->pdoStatement = $pdoStatement;
    }

    /**
     * @param $className
     * @return \Generator
     */
    public function fetch($className):\Generator
    {
        while ($row = $this->pdoStatement->fetchObject($className)) {
            yield $row;
        }
    }

}