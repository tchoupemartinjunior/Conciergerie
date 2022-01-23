<?php
// $servername = "localhost";
// $username = "s177672";
// $password = "Bhe237xd";
// $databaseName="s177672";


// // Create connection
// $conn = new mysqli($servername, $username, $password, $databaseName);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

require_once('connectdb.php');

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

if ($action == 'create') { // for add a commande
    $nomClient = $_POST['nomClient'];
    $numCommande = $_POST['numCommande'];
    $dateCommande = $_POST['dateCommande'];
    $status = $_POST['status'];

    echo  "$nomClient <br> $numCommande <br> $dateCommande <br> $status";
    echo ("INSERT INTO commande (numCommande,dateCommande,status,idClient) VALUES ('', '$dateCommande', '$status', (SELECT idClient FROM client WHERE nomClient = '$nomClient') ); ");

    //$string = "INSERT INTO commande VALUES (DEFAULT,'$numCommande', '$dateCommande', '$status')";
    //$nomClis = $conn->query("SELECT nomClient form client;");
 $ajouterCmds = $conn->query("INSERT INTO commande VALUES (DEFAULT,' ', '$dateCommande', '$status', (SELECT idClient FROM client WHERE nomClient = '$nomClient') );");
    //$ajouterCmds = $conn->query("INSERT INTO commande (numCommande,dateCommande,status,idClient) VALUES (' ', '$dateCommande', '$status', (SELECT idClient FROM client WHERE nomClient = '$nomClient') );" );
    if ($ajouterCmds) {
        $result['message'] = "Une commande ajoutée avec succes";
    } else {
        $result['error'] = true;
        $result['message'] = "Echec cette commande n'a pas été ajoutée";
    }
    // $ajouterCmds -> free_result();
    // echo ("INSERT INTO commande (numCommande,dateCommande,status,idClient) VALUES ('', '$dateCommande', '$status', (SELECT idClient FROM client WHERE nomClient = '$nomClient') ) ");
   
    //generation numCommande
    $id = $conn->query("SELECT idCommande FROM commande WHERE idClient = (SELECT idClient FROM client WHERE nomClient = '$nomClient' ) order by idCommande desc LIMIT 1;" );
    $row = $id->fetch_array(MYSQLI_NUM);
 
    echo $row[0];

    list($y,$m,$d)=explode('-',$dateCommande); 
    //how to append the first letter of the first and last name of client
    $stringId = "";
    $words = explode(" ", $numCommande);
    foreach ($words as $word) {
        $stringId = $stringId.strtoupper(substr($word, 0, 1));
    }
    $numCmd= $d.$m.substr($y, 2, 2)."-".$stringId."-C".sprintf("%03d",$row[0]);
    echo "numCommande :".$numCmd;

    $ajouterNumCmd = $conn->query("UPDATE commande SET numCommande= '$numCmd' WHERE idCommande ='$row[0]'");
    var_dump( $ajouterNumCmd);

    
}
/**************fin creation client */

/***********modifier des clients */

if($action=='update'){ 
    $idCmd=$_POST['idCommande'];
    
    $status = $_POST['status'];


    $modifierCmd = $conn->query("UPDATE commande SET
    status='$status' WHERE idCommande='$idCmd'");
   
    if($modifierCmd){
        $result['message'] = "Commande modifiée avec succes";
    }
    else{
        $result['error'] = true;
        $result['message'] = "Echec cette commande n'a pas été modifié";
    }
    
}
/***********FIn  modifier des clients */

/***********Supprimmer des clients */

if($action=='delete'){ // clients
    $idCmd=$_POST['idCommande'];
   
    $delCmd= $conn->query("DELETE FROM commande WHERE idCommande ='$idCmd'"); 
    // need to delete in facture ?
    $delFac= $conn->query("DELETE FROM facture WHERE idCommande ='$idCmd'"); 
   

    if($delCmd){
        $result['message'] = "commande supprimée avec succes";
    }
    else{
        $result['error'] = true;
        $result['message'] = "Echec cette commande n'a pas été supprimée";
    }
}
/***********FIN     Supprimmer des clients */
//echo json_encode($result['clients
//]);
echo json_encode($result);
?>