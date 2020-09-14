<?php
 /*$retVal = (isset($_GET['url'])) ? $_GET['url'] : "" ;
 $vector=explode("/",$retVal);
 echo "<pre>";
 var_dump($vector);
 echo "</pre>";*/

 require_once "./controller/vistaControlador.php";

 $controlar=new vistaControllador();
 $controlar->Index();