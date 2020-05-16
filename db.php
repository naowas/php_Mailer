<?php
$servername = "localhost";
$username = "root";
$password = "";

$username2 = "server_db";
$password2 = "*******";

$local="localhost";
$server_type = $_SERVER['HTTP_HOST'];
echo "Server: ";
echo $server_type ;
echo "<br>";
if($server_type===$local){
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=naowas_mail", $username, $password);
    
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "DB Connected to localhost";
    
        }
    catch(PDOException $e)
        {
        echo "Connection failed for localhost: " . $e->getMessage();
        }
}

elseif($server_type!==$local){
    try {
        $conn = new PDO("mysql:host=$servername;dbname=naowas_mail", $username2, $password2);
    
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "DB Connected to remote host";
    
        }
    catch(PDOException $e)
        {
        echo "Connection failed for remote host: " . $e->getMessage();
        }
}

    else{
        echo "Nothing found";
       }

?>
