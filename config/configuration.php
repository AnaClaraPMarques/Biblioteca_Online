<?php

// CREDENCIAIS DO BANCO DE DADOS

define("DB_NAME", "biblioteca_online");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_PORT", "3306");
define("DB_HOST", "localhost");

// CONEXÃO COM O BANCO

try {

    $connection = new PDO(
        "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASSWORD
    );

    // Configura o PDO para mostrar erros
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    die("Erro na conexão com o banco de dados: " . $e->getMessage());

}