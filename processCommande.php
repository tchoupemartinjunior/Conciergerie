<?php
$servername = "localhost";
$username = "root";
$password = "";
$databaseName = "concierdb_final";


// Create connection
$conn = new mysqli($servername, $username, $password, $databaseName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = array('error' => false);
$action = '';

if (isset($_GET['action'])) {
    $action = $_GET['action']; // get action value in url
}

/***********lecture des clients */
if ($action == 'read') {
    //$string = "SELECT numCommande, dateCommande, status FROM commande;";
    $sql = $conn->query("SELECT idCommande, numCommande, dateCommande, status, codeClient FROM commande cmd , client cli WHERE cmd.idClient = cli.idClient;"); // ?????sql query
    $commandes = array();
    while ($row = $sql->fetch_assoc()) {
        array_push($commandes, $row);
    }
    $result['commande'] = $commandes;
}

//echo json_encode($result);

if ($action == 'create') { // for commande
    $numCommande = $_POST['numCommande'];
    $dateCommande = $_POST['dateCommande'];
    $status = $_POST['status'];


    //$string = "INSERT INTO commande VALUES (DEFAULT,'$numCommande', '$dateCommande', '$status')";
    $ajouterCmds = $conn->query("INSERT INTO commande VALUES (DEFAULT,'$numCommande', '$dateCommande', '$status');");


    if ($ajouterCmds) {
        $result['message'] = "Une commande ajoutée avec succes";
    } else {
        $result['error'] = true;
        $result['message'] = "Echec cette commande n'a pas été ajoutée";
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
