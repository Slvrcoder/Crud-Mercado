<?php

include "../infra/conexao.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id           = $_POST["id"];
    $nome         = $_POST["nome"];
    $descricao    = $_POST["descricao"];
    $preco        = $_POST["preco"];
    $categoria    = $_POST["categoria"];
    $quantidade_estoque = $_POST["quantidade_estoque"];
    $validade     = $_POST["validade"];

    $stmt = mysqli_prepare(
        $conexao,
        "UPDATE produtos
         SET nome = ?, descricao = ?, preco = ?, categoria = ?, quantidade_estoque = ?, validade = ?
         WHERE id = ?"
    );

    mysqli_stmt_bind_param($stmt, "ssdsidi", $nome, $descricao, $preco, $categoria, $quantidade_estoque, $validade, $id);
    mysqli_stmt_execute($stmt);

    header("Location: ../index.php");
    exit();
}


$id = $_GET["id"];

$stmt = mysqli_prepare($conexao, "SELECT * FROM produtos WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);
$produto = mysqli_fetch_assoc($resultado);

if (!$produto) {
    die("Produto não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <header>
        <h1>Produtos</h1>
    </header>
    <main>
        <div>
            <h2>Editando o produto!</h2>
            <form action="produtos-editar.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $produto["id"] ?>">

                <label for="nome">Nome:</label>
                <input type="text" name="nome" value="<?php echo htmlspecialchars($produto["nome"]) ?>">
                <br>
                <label for="descricao">Descrição:</label>
                <input type="text" name="descricao" value="<?php echo htmlspecialchars($produto["descricao"]) ?>">
                <br>
                <label for="preco">Preço:</label>
                <input type="number" step="0.01" name="preco" value="<?php echo $produto["preco"] ?>">
                <br>
                <label for="categoria">Categoria:</label>
                <input type="text" name="categoria" value="<?php echo htmlspecialchars($produto["categoria"]) ?>">
                <br>
                <label for="quantidade_estoque">Quantidade em Estoque:</label>
                <input type="number" name="quantidade_estoque" value="<?php echo $produto["quantidade_estoque"] ?>">
                <br>
                <label for="validade">Validade:</label>
                <input type="date" name="validade" value="<?php echo $produto["validade"] ?>">
                <br>

                <button type="submit">Atualizar</button>
            </form>
        </div>
    </main>
</body>
</html>