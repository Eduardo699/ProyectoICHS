<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if ($_SESSION['usuario']=="") {
	header("location:../index.php");
}
if ($_SESSION['id']!=$_SESSION['id']) {
	header('location:../index.php');
}
