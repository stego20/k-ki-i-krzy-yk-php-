<?php
session_start();
if(!isset($_SESSION['tabela'])){
    $_SESSION['tabela']=[[0,0,0],[0,0,0],[0,0,0]];
}

if(!isset($_SESSION['gracz'])){
    $_SESSION['gracz']=1;
}
?>