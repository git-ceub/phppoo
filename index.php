<?php
    include 'Database.php';
    include 'Pessoa.php';

    $acao = isset($_GET['acao']) ? $_GET['acao'] : null;
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    $nome = isset($_GET['nome']) ? $_GET['nome'] : null;
    $idade = isset($_GET['idade']) ? $_GET['idade'] : null;

    $p = new Pessoa();

    //Atualizar - 1ª parte
    $pessoaSelecionada = null;
    if($acao=="editar"){
        $pessoaSelecionada = $p->listarPorId($id);
    }

    // Exclusão
    if($acao == "excluir") {
        $p->excluir($id);
    }

    // Inserção
    if ($nome) {
        $p->inserir($nome, $idade);
        header('Location: index.php');
    }

    // Lista de pessoas
    $pessoas = $p->listar();
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="#" method="get">

        Nome: <input type="text" name="nome" required 
                     value="<?php echo isset($pessoaSelecionada['nome']) ? $pessoaSelecionada['nome'] : '' ?>">
        Idade: <input type="number" name="idade" 
                      value="<?php echo isset($pessoaSelecionada['idade']) ? $pessoaSelecionada['idade'] : ''  ?>">
        <input type="submit" value="Salvar">
        <input type="reset" value="Limpar">

    </form>

    <br>

    <table border="1" width="100%"> 
        <?php foreach($pessoas as $pessoa) { ?>
            <tr>
                <td><?php echo $pessoa['nome'] ?></td>
                <td><?php echo $pessoa['idade'] ?></td>
                <td>
                    <a href="index.php?id=<?php echo $pessoa['id'] ?>&acao=editar">Editar</a> |
                    <a href="index.php?id=<?php echo $pessoa['id'] ?>&acao=excluir">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    
</body>
</html>