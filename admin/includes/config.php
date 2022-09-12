<?php
// DB credentials.
// define('DB_HOST', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASS', '');
// define('DB_NAME', 'spa');
// // Establish database connection.
// try {
//     $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
// } catch (PDOException $e) {
//     exit("Error: " . $e->getMessage());
// }

?>

<?php
// DB credentials.
define('DB_HOST', 'localhost');
define('DB_USER', 'smartp85_smartp85');
define('DB_PASS', 'I163[zAp-9SjnG');
define('DB_NAME', 'smartp85_spa');
// Establish database connection.
try {
    $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?> 