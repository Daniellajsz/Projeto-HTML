<?php
session_start();     

session_unset();      // limpa todas as variáveis de sessão
session_destroy();    // destrói a sessão

// redireciona para a página de login
header("Location: login.html");

exit;
?>
