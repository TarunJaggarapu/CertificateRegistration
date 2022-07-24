<!DOCTYPE html>  
 <html>  
 <head>  
      <meta charset="utf-8">  
      <style type="text/css">  
           *{  
                padding: 0;  
                margin: 0;  
                box-sizing: border-box;  
           }  
           body{  
                width: 100%;  
                min-height: 100vh;  
                background-color: #041a30;  
           }  
           .container{  
                max-width: 900px;  
                margin: 100px auto;  
                width: 100%;  
           }  
           table{  
                border-collapse: collapse;  
                width: 100%;  
           }  
           table th{  
                background-color: #057cf2;  
                color: #fff;  
                padding: 10px;  
           }  
           table td{  
                padding: 12px;  
                color: #fff;  
                font-size: 1em;  
                text-align: center;  
           }  
           table tr:nth-child(odd){  
                background-color: #797676;  
           }  
      </style>  
 </head>  
 <body>  
 <div class="container">  
<?php
$search = $_POST['search'];
 $servername = "";
 $username = "";
 $password = "";
 $db = "cert_table";

 $conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select * from cert_table where certification_id like '$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border=3><tr><th>Employee_name</th><th>CSP</th><th>Certification_level</th><th>Certification_name</th><th>Certification_id</th><th>Doc</th><th>Exp</th><th>Validity</th><th>Operation</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["employee_name"]. "</td><td>" . $row["csp"]. "</td><td>" . $row["certification_level"]. "</td><td>" . $row["certification_name"]. "</td><td>" . $row["certification_id"]. "</td><td>" . $row["doc"]. "</td><td>" . $row["exp"]. "</td><td>" . $row["validity"]. "</td><td><a href='delete.php?id=".$row['certification_id']."' id='btn'>Delete</a></td></tr>"; 
    }
    echo "</table>";
} else {
    echo "<h1>0 results</h1>";
}

$conn->close();
?>
 </div>  
 </body>  
 </html> 



