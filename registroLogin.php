<?php

    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "twilher tcc";


    $conn = new mysqli($servername, $username, $password, $dbname);


    if(isset($_POST['submit']) && !empty($_POSt['email']) && !empty($_POST['senha'])) 
    {
        // acessar sistema
        include_once('config.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        print_r('Email:' . $email);
        print_r('Senha:' . $senha);
    }
    else
    {
        // não acessa sistema
        header('Location: login.php');
    }
