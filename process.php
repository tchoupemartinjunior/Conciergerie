<?php
$servername = "localhost";
$username = "root";
$password = "";
$databaseName="conciergeriedb";

// Create connection
$conn = new mysqli($servername, $username, $password,$databaseName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$result = array('error'=>false);
$action = '';

if(isset($_GET['action'])){
    $action = $_GET['action'];
}
if($action=='read'){
    $sql = $conn->query("SELECT * FROM client");
    $clients = array();
    while($row = $sql->fetch_assoc()){
        array_push($clients,$row);
    }
    $result['client'] = $clients; 
}
if($action=='create'){ // client id needed in database, sepoarate firstname from lastname
    $name = $_POST['nom'];
    $email = $_POST['email'];
    $phone = $_POST['telephone'];
    $facebook = $_POST['facebook'];
    $sql = $conn->query("INSERT INTO client(nomClient,facebook) VALUES('$name','$facebook'); 
    INSERT INTO telephone(numTelephone) VALUES('$phone'))");

    if($sql){
        $result['message'] = "Cient ajouté avec succes";
    }
    else{
        $result['error'] = true;
        $result['message'] = "Echec le cient n'a pas été ajouté";
    }
}

echo json_encode($result);
?>