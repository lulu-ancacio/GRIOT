<?php
// // ========== Config ============
$_DB['server'] = 'localhost'; // Servidor MySQL
$_DB['user'] = 'root'; // Usuário MySQL
$_DB['password'] = 'IFPR2023'; // Senha MySQL
$_DB['database'] = 'bd'; // Banco de dados MySQL
// ==============================
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Desativa relatórios de erros
try {
$mysqli = new mysqli($_DB['server'], $_DB['user'], $_DB['password'], $_DB['database']);
$mysqli->set_charset("utf8mb4");
} catch (Exception $e) {
error_log($e->getMessage());
exit('Alguma coisa estranha aconteceu...');
}
?>
