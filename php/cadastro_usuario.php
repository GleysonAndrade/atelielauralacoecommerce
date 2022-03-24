<?php
session_start();
include_once "conexao.php";
// esse significa colocar hora de acordo com a região
date_default_timezone_set('America/Sao_Paulo');
// date() função de pegar a hora
$data = date('d/m/Y');

