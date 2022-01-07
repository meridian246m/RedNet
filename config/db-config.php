<?php
  Error_Reporting(E_ALL & ~E_NOTICE); 
  $dblocation = "localhost";
  $dbname = "md246";
  $dbuser = "md246m";
  $dbpasswd = "102ada02deniss";
  $version = "0.1";  
  $dbcnx = mysqli_connect($dblocation,$dbuser, $dbpasswd, $dbname);
if (!$dbcnx) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>