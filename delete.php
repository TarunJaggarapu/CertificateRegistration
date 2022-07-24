<?php
 $servername = "";
 $username = "";
 $password = "";
 $db = "cert_table";

 $conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}
if (isset($_GET['id'])) {  
    $id = $_GET['id'];  
    $sql = "DELETE FROM `cert_table` WHERE certification_id = '$id'";  
    $result = $conn->query($sql);  
    if ($result) {
        // echo '<script type="text/javascript"> alert("Data Deleted") </script>';  
         header('location:certifcate.html');  
    }else{  
         echo "Error: ".mysqli_error($conn);  
    }  
}  
?>