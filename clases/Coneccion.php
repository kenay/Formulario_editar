<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Coneccion
 *
 * @author alphyon
 */
class Coneccion {
  $dsn='mysql:dbname=alumnos;host=127.0.0.1';
  $usuario='root';
  $clave='';
   try{
     $con = new POD($dsn,$usuario,clave);
   }cath (PODException $e){
     print $e->getTraceAsString()
   }
   
