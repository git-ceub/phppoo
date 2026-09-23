<?php

class Pessoa {

    public int $id;
    public string $nome;
    public int $idade;

    private PDO $conexao;

    public function __construct() {
        $this->conexao = Database::getConnection();
    }

    public function listarPorId($id){
        $sql = "SELECT * FROM pessoa WHERE id =:id";
        $smt =  $this->conexao->prepare($sql);

        $smt->bindValue(':id', $id);
        
        $smt->execute();
        return $smt->fetch();
    }

    public function inserir($nome, $idade) {
        $sql = "INSERT INTO pessoa (nome, idade)
                VALUES (:nome,:idade)";
        $smt =  $this->conexao->prepare($sql);

        $smt->bindValue(':nome', $nome);
        $smt->bindValue(':idade', $idade);

        $smt->execute();
    }

    public function excluir($id) {
        $sql = "DELETE FROM pessoa WHERE id =:id";

        $smt =  $this->conexao->prepare($sql);
        $smt->bindValue(':id', $id);

        $smt->execute();
    }

    public function atualizar($nome, $idade, $id){
        $sql = "UPDATE pessoa SET nome =:nome, idade =:idade 
                WHERE id =:id";

        $smt =  $this->conexao->prepare($sql);
        $smt->bindValue(':nome', $nome);
        $smt->bindValue(':idade', $idade);
        $smt->bindValue(':id', $id);

        $smt->execute();
    }

    public function listar(){
        $sql = "SELECT * FROM pessoa";
        $smt =  $this->conexao->prepare($sql);
        $smt->execute();
        return $smt->fetchAll(PDO::FETCH_ASSOC);
    }

}