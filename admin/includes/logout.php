<?php
session_start();
session_destroy(); //destroi a sessão
session_unset(); // destroi todas as variaves da sessão

header("Location: ../../login.php"); //redireciona para a  "index.php"