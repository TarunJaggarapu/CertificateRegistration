<?php
    $employee_name = $_POST['name'];
    $csp = $_POST['drop'];
    $certification_level = $_POST['ct_level'];
    $certification_name = $_POST['ct_name'];
    $certification_id = $_POST['ct_id'];
    $doc = $_POST['date'];
    $exp = $_POST['exp_date'];
    $validity = $_POST['Validity'];

    if(!empty($employee_name)||!empty($csp)||!empty($certification_level)||!empty($certification_name)||!empty($certification_id)||!empty($doc)||!empty($exp)||!empty($validity)){
       
            $host="";
            $dbUsername="";
            $dbPassword="";
            $dbname="cert_table";

            $conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);
            if(mysqli_connect_error()){
                die('Connect Error('. mysqli_connect_errorno().')'.mysqli_connect_error());
            }else{
                $SELECT = "SELECT certification_id from cert_table Where certification_id= ? Limit 1";
                $INSERT="INSERT INTO cert_table(employee_name,csp,certification_level,certification_name,certification_id,doc,exp,validity) values(?,?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("s", $certification_id);
            $stmt->execute();
            $stmt->bind_result($certification_id);
            $stmt->store_result();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("sssssssi",$employee_name, $csp, $certification_level, $certification_name, $certification_id, $doc,$exp,$validity);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                    
                }
                else {
                    echo("dont");
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this certfication_id.";
            }
            $stmt->close();
            $conn->close();
        }
    }else{
        echo "All Fields are required";
        die();
    }
?>

