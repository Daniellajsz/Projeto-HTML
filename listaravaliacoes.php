<?php
require "conexao.php";

$sql = "SELECT id, nome, comentario, estrela, data
        FROM avaliacoes
        ORDER BY id DESC";

$resultado = $conexao->query($sql);

