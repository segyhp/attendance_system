<?php
/**
 * Created by PhpStorm.
 * User: Segy Hendro P
 * Date: 30 Mar 2017
 * Time: 18:05
 */

session_start();
unset($_SESSION['user_session']);

if(session_destroy())
{
    header("Location: ../login.php");
}