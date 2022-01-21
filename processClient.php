<?php
$servername = "localhost";
$username = "s177672";
$password = "Bhe237xd";
$databaseName="s177672";


// Create connection
$conn = new mysqli($servername, $username, $password,$databaseName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = array('error'=>false);
$action = '';

if(isset($_GET['action'])){
    $action = $_GET['action']; // get action value in url
}

/***********lecture des clients */
if($action=='read'){
    $sql = $conn->query("SELECT idClient, nomClient, prenomClient, CONCAT(prenomClient, ' ',nomClient) as nom,codeClient, adresse, facebook, instagram, email, telephone, points,nomMember from client join membership on points BETWEEN minPoints and maxPoints;"); // ?????sql query

    $clients = array();
    while($row = $sql->fetch_assoc()){
        array_push($clients,$row);
    }
    $result['client'] = $clients; 
}

//echo json_encode($result);

// insertion d'un clients
if($action=='create'){ 

    $nom = $_POST['nomClient'];
    $prenom = $_POST['prenomClient'];

    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $adresse = $_POST['adresse'];

    
    $ajouterclients= $conn->query("INSERT INTO client (nomClient, prenomClient, email, telephone, facebook, adresse)
    VALUES('$nom', '$prenom', '$email','$telephone','$facebook','$adresse')");  // *important de preciser l'ordre. clientstock (libelle, telephone, email, category)
    
  /*********GENERATION DU CODE CLIENT */
    $id = $conn->query("SELECT idClient FROM client WHERE nomClient='$nom'");
    $row = $id->fetch_array(MYSQLI_NUM);
 
    echo $row[0];

    $DateAndTime = substr(date('Y'),-2);
    $stringId = "SPR";
    $codeClient= $DateAndTime."-".$stringId."-".$row[0];
    echo "CODECLIENT :".$codeClient;

    $ajouterCodeCient = $conn->query("UPDATE client SET codeClient='$codeClient'WHERE idClient='$row[0]'");
/**********************FIN GENERATION CODE CLIENT*********************************************** */


    if($ajouterclients){
        $result['message'] = "clients ajouté avec succes";
    }
    else{
        $result['error'] = true;
        $result['message'] = "Echec le client n'a pas été ajouté";
    }


}
/**************fin creation client */

/***********modifier des clients */

if($action=='update'){ 
       $idClient=$_POST['idClient'];
       $nom = $_POST['nomClient'];
       $prenom = $_POST['prenomClient'];

      $telephone = $_POST['telephone'];
      $email = $_POST['email'];
      $facebook = $_POST['facebook'];
      $instagram = $_POST['instagram'];
      $adresse = $_POST['adresse'];
   
    

    $modifierclients = $conn->query("UPDATE client SET
    nomClient='$nom',prenomClient='$prenom', telephone= '$telephone',email='$email', facebook='$facebook', adresse='$adresse' WHERE idClient='$idClient'");

   
    if($modifierclients){
        $result['message'] = "clients
         modifié avec succes";
        var_dump( $modifierclients);
    }
    else{
        $result['error'] = true;
        $result['message'] = "Echec le client n'a pas été modifié";
    }
    
}
/***********FIn  modifier des clients */

/***********Supprimmer des clients */


if($action=='delete'){ // clients
   
    $idClient= $_POST['idClient'];
   
    $supprimmerclients
     = $conn->query("DELETE FROM client WHERE idClient='$idClient'"); 
   

    if($modifierclients ){
        $result['message'] = "client supprimé avec succes";
    }
    else{
        $result['error'] = true;
        $result['message'] = "Echec, le client'a pas été supprimé";

    }
}
/***********FIN     Supprimmer des clients */
//echo json_encode($result['clients
//]);
echo json_encode($result);


?>