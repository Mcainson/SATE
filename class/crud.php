<?php

class crud {
    public $tables;
    public $campos;
    public $sWhere;
   
    

    public function agregar_datos($tables, $campos, $sWhere){
        $obj= new conectar();
        $conn=$obj->conexion();
        
        $query = mysqli_query($conn,"SELECT $campos FROM  $tables where $sWhere");

        //return mysqli_query($conn,$query);


    }













}