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
            $dbHost = env('DB_HOST');
            if (empty($dbHost)) {
                throw new Exception('Please provide Database host address.');
            }

            $dbName = env('DB_NAME');
            if (empty($dbName)) {
                throw new Exception('Please provide Database name.');
            }

            $dbPort = env('DB_PORT');
            if (empty($dbPort)) {
                throw new Exception('Please provide Database port no.');
            }

            $dbUser = env('DB_USER');
            if (empty($dbUser)) {
                throw new Exception('Please provide Database user name.');
            }

            $dbPassword = env('DB_PASSWORD');
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
    public function execute(string $sqlQuery, array $bindParams = []): \PDOStatement|false
    {
        $pdo = $this->connect();

        $stmt = $pdo->prepare($sqlQuery);
        $stmt->execute($bindParams);

        return $stmt;
    }

    /**
     * Get all records from the database.
     *
     * @param string $sqlQuery
     * @return array|false
     */
    public function fetchAll(string $sqlQuery, array $bindParams = []): array|false
    {
        $stmt = $this->execute($sqlQuery, $bindParams);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Get a single record from the database.
     *
     * @param string $sqlQuery
     * @return array|false
     */
    public function fetchObj(string $sqlQuery, array $bindParams = []): mixed
    {
        $stmt = $this->execute($sqlQuery, $bindParams);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
