
<?php 

class conectar{
    public function conexion(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        else{
            mysqli_select_db($conn, "sate");
        }
        
        
        return $conn;
    }
}


?>