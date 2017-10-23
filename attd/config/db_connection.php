<?php
/**
 * Created by PhpStorm.
 * User: Segy Hendro P
 * Date: 21 Mar 2017
 * Time: 15:02
 */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD','terserah');
define('DB_NAME','attd');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME)
OR die('Could not connect to MySQL: ' . mysqli_connect_error());
