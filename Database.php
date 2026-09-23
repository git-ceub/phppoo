<?php

    class Database {

        public static function getConnection() : PDO
        {
            $host = "127.0.0.1";
            $dbname = "exemplo";
            $user = "root";
            $pass = "ceub123456";
            $port = "3306";

            $dns = "mysql:host={$host};
                    dbname={$dbname};port={$port}";
            $conexao = new PDO($dns, $user, $pass);
            return $conexao;
        }
   
    }

?>