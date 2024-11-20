<?php
session_start();
session_destroy(); // Destrói a sessão
header(header: "Location: login.php"); // Redireciona para a página de login
exit();
