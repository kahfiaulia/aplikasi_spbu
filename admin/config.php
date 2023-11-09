<?php

define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'stok_bensin');

$db = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

if ($db->connect_error) {
	die('Database Not Connect. Error : ' . $dbconnect->connect_error);
}
