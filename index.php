<?php
session_start();
date_default_timezone_set('America/Bogota');
require_once 'model/database.php';
$controller = 'user'; 
 if (!isset($_SESSION['idUser'])) {
      require_once "controller/$controller.controller.php";
      $controller = ucwords($controller).'controller';
      $controller = new $controller;

   if (isset($_REQUEST['c']) and isset($_REQUEST['a'])) {
       $email    = $_REQUEST['email'];
       $password = $_REQUEST['password'];
       $controller->validate($email,$password);
     }else{
        $controller->login();
     }        

 }else{
 
  if (!isset($_REQUEST['c']))
  {
      require_once "controller/$controller.controller.php";
      $controller = ucwords($controller).'controller';
      $controller = new $controller;
      $controller->dashboard();
  }
  else
  {
    // Obtenemos el controlador por la url 
    $controller = strtolower(Database::encryptor('decrypt',$_REQUEST['c']));
    $action = strtolower(Database::encryptor('decrypt',$_REQUEST['a']));

    //Crear el controlador
    require_once "controller/$controller.controller.php";
      $controller = ucwords($controller).'controller';
      $controller = new $controller;    
      
      call_user_func(array( $controller,$action ));
  }
 }
  


