<?php

namespace Model;

require_once __DIR__ . "/../config/configuration.php";

use PDO;
use PDOException;

class Connection
{
    public static function getInstance(): PDO
    {
        try {

            $connection = new PDO(
                "mysql:host=" . DB_HOST .
                ";port=" . DB_PORT .
                ";dbname=" . DB_NAME .
                ";charset=utf8mb4",
                DB_USER,
                DB_PASSWORD
            );

            $connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            $connection->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_ASSOC
            );

            return $connection;

        } catch (PDOException $erro) {

            die(
                "Erro na conexão com o banco de dados: "
                . $erro->getMessage()
            );
        }
    }
}