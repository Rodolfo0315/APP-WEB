<?php
/*define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'root');
define('DB_SERVER_PASSWORD', '');
define('DB_DATABASE', 'taller_mecanico');*/
include('../layout/dbcon.php');
//$connexion = new mysqli("localhost", "root", "", "taller_mecanico");

$html = '';
$key = $_POST['key'];

$result = $con->query(
    'SELECT * FROM clientes 
    WHERE  nombre LIKE "%'.strip_tags($key).'%" '
);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<div><a class="suggest-element" data="' . $row['nombre'] . '" id="cliente' . $row['id_cliente'] . '">' . $row['nombre'] . '</a></div>';

    }
}
echo $html;
?>