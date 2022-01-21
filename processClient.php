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
    $sql = $conn->query("SELECT idClient, CONCAT(prenomClient, ' ',nomClient) as nom,codeClient, adresse, facebook, instagram, email, telephone, points,nomMember from client join membership on points BETWEEN minPoints and maxPoints;"); // ?????sql query
    $clients = array();
    while($row = $sql->fetch_assoc()){
        array_push($clients,$row);
    }
    $result['client'] = $clients; 
}

//echo json_encode($result);

if($action=='create'){ // clients
     $nom = $_POST['nomClient'];
     $prenom = $_POST['prenomClient'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $adresse = $_POST['adresse'];
   
    
    $ajouterclients= $conn->query("INSERT INTO client (nomClient, prenomClient, email, telephone, facebook, adresse)
    VALUES('$nom', '$prenom', '$email','$telephone','$facebook','$adresse')");  // *important de preciser l'ordre. clientstock (libelle, telephone, email, category)
   

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
/*
if($action=='update'){ 
       $idclient=$_POST['idClient'];
       $nom = $_POST['nom'];
       $prenom = $_POST['prenom'];
      $telephone = $_POST['telephone'];
      $email = $_POST['email'];
      $facebook = $_POST['facebook'];
      $instagram = $_POST['instagram'];
      $adresse = $_POST['adresse'];
   
    
   
    = $conn->query("SELECT idClient
     from clientstock where libelle='$libelle'");
    $modifierclients = $conn->query("UPDATE clientstock SET
    libelle='$libelle', telephone= '$telephone',email='$email', category='$facebook' WHERE idclients='$idclients'");
   
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
/*
if($action=='delete'){ // clients
     id needed in database, sepoarate firstlibelle from lastlibelle
    $idclients
     = $_POST['idclients
    '];
   
    $supprimmerclients
     = $conn->query("DELETE FROM clientstock WHERE idclients
    ='$idclients
    '"); 
   

    if($modifierclients
    ){
        $result['message'] = "clients supprimé avec succes";
    }
    else{
        $result['error'] = true;
        $result['message'] = "Echec l'clientsn'a pas été supprimé";
    }
}
/***********FIN     Supprimmer des clients */
//echo json_encode($result['clients
//]);
echo json_encode($result);


?>