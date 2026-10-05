<?php
require_once "infra/conexao.php";

$sql = "SELECT * FROM mercado";
$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    die("Erro na consulta: " . mysqli_error($conexao));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <main>

        <div>
            <h2>Adicione uma nova mercadoria!</h2>
            <form action="public/produtos-cadastrar.php" method="POST">
                <label for="nome">Nome:</label>
                <input type="text" name="nome produto">
                <br>
                <label for="descricao">Descrição:</label>
                <input type="text" name="descricao">
                <br>
                <label for="preco">Preço:</label>
                <input type="number" name="preco" step="0.01" min="0">
                <br>
                <label for="categoria">Categoria:</label>
                <input type="text" name="categoria">
                <br>
                <label for="quantidade-estoque">Quantidade em Estoque:</label>
                <input type="number" name="quantidade-estoque" min="0">
                <br>
                <label for="validade">Validade:</label>
                <input type="text" name="validade">
                <br>

                <button type="submit">Cadastrar</button>
            </form>
        </div>

        <div>
            <h2>Produtos Cadastrados</h2>
            <table border="1">
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Quantidade em Estoque</th>
                    <th>Validade</th>
                </tr>

                <?php while ($linha = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?php echo $linha["nome"] ?></td>
                        <td><?php echo $linha["descricao"] ?></td>
                        <td><?php echo $linha["preco"] ?></td>
                        <td><?php echo $linha["categoria"] ?></td>
                        <td><?php echo $linha["quantidade_estoque"] ?></td>
                        <td><?php echo $linha["validade"] ?></td>
                        <td>
                            <a href="public/produtos-editar.php? id=<?php echo $linha["id"] ?>">Editar</a>
                            <a href="public/produtos-excluir.php? id=<?php echo $linha["id"] ?>" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>

                

            </table>
        </div>
    </main>
</body>
</html>