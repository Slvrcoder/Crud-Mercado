<?php

include "../infra/conexao.php";

$nome = $_POST["nome-produto"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$categoria = $_POST["categoria"];
$quantidade_estoque = $_POST["quantidade-estoque"];
$validade = $_POST["validade"];

$query = "INSERT INTO produtos(nome, descricao, preco, categoria, quantidade_estoque, validade) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conexao, $query);

mysqli_stmt_bind_param($stmt, "ssdsid", $nome, $descricao, $preco, $categoria, $quantidade_estoque, $validade);


mysqli_stmt_execute($stmt);

header("Location: ../index.php");
exit();

?>