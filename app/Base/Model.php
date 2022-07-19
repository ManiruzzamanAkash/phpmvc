<?php

namespace App\Base;

use Exception;

class Model
{
    public function __construct()
    {
        $this->connect();
    }

    /**
     * Connect the database.
     *
     * @return \PDO
     */
    public function connect(): \PDO
    {
        try {
            $dbHost = isset($_ENV['DB_HOST']) ? $_ENV['DB_HOST'] : '';
            if (empty($dbHost)) {
                throw new Exception('Please provide Database host address.');
            }

            $dbName = isset($_ENV['DB_NAME']) ? $_ENV['DB_NAME'] : '';
            if (empty($dbName)) {
                throw new Exception('Please provide Database name.');
            }

            $dbPort = isset($_ENV['DB_PORT']) ? $_ENV['DB_PORT'] : '';
            if (empty($dbPort)) {
                throw new Exception('Please provide Database port no.');
            }

            $dbUser = isset($_ENV['DB_USER']) ? $_ENV['DB_USER'] : '';
            if (empty($dbUser)) {
                throw new Exception('Please provide Database user name.');
            }

            $dbPassword = isset($_ENV['DB_PASSWORD']) ? $_ENV['DB_PASSWORD'] : '';
            if (empty($dbPassword)) {
                throw new Exception('Please provide Database password.');
            }

            return new \PDO("mysql:host=$dbHost;dbname=$dbName;port=$dbPort", $dbUser, $dbPassword);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Execute PDO query.
     *
     * @param string $sqlQuery
     * @return \PDOStatement|false
     */
    public function execute(string $sqlQuery): \PDOStatement|false
    {
        $stmt = $this->connect()->query($sqlQuery);
        $stmt->execute();

        return $stmt;
    }

    /**
     * Get all records from the database.
     *
     * @param string $sqlQuery
     * @return array|false
     */
    public function fetchAll(string $sqlQuery): array|false
    {
        $stmt = $this->execute($sqlQuery);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Get a single record from the database.
     *
     * @param string $sqlQuery
     * @return array|false
     */
    public function fetchObj(string $sqlQuery): mixed
    {
        $stmt = $this->execute($sqlQuery);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
