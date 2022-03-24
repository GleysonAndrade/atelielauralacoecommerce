<?php

define('HOST', '177.234.153.133');
define('USUARIO', 'laurala1_atelie_laura_lacos');
define('SENHA', 'C_PJRYjNeewZ');
define('DB', 'laurala1_atelie_laura_lacos');
$conn = mysqli_connect (HOST, USUARIO, SENHA, DB);

if (!$conn) {

    echo "N conectado";
} else {
    echo "conectado";
}
?>