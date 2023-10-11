<?php

namespace Api\Websocket;

use PDO;
use PDOException;

class Conexao 
{
    private string $host        = "****";
    private string $user        = "****";
    private string $pass        = "****";
    private string $dbname      = "****";
    private int|string $port    = "****";
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