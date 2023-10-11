<?php

namespace Api\Websocket;

use PDO;
use PDOException;

class Conexao 
{
    private string $host        = "localhost";
    private string $user        = "chat_js";
    private string $pass        = "chatchat";
    private string $dbname      = "db_chatjs";
    private int|string $port    = "3306";
    private object $connect;

    public function getConnection(): object
    {
        try {
            $this->connect = new PDO("mysql:host={$this->host};port={$this->port};dbname=" . $this->dbname, $this->user, $this->pass);

            return $this->connect;
        } catch (PDOException $ex) {
            die("Erro: Falha ao tentar conectar-se ao banco de dados: '{$ex->getMessage()}'");
        }
    }
}