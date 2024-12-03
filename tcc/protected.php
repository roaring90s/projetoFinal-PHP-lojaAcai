<?php 

if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['id'])){
    echo "<script>alert('Você não pode acessar essa página. Faça login.')</script>";
    echo "<script>window.location.href = 'login.php';</script>";
    
}
?>