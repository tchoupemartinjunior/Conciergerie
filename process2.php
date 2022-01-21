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
if($action=='read'){
    $sql = $conn->query("SELECT * FROM articlestock");
    $articles = array();
    while($row = $sql->fetch_assoc()){
        array_push($articles,$row);
    }
    $result['article'] = $articles; 
}

//echo json_encode($result);

if($action=='create'){ // article id needed in database, sepoarate firstlibelle from lastlibelle
    $libelle = $_POST['libelle'];
    $prixVente = $_POST['prixVente'];
    $prixAchat = $_POST['prixAchat'];
    $categorie = $_POST['category'];
    $ajouterArticle = $conn->query("INSERT INTO articlestock (libelle, prixVente, prixAchat, category)
    VALUES('$libelle', '$prixVente','$prixAchat', '$categorie')");  // *important de preciser l'ordre. articlestock (libelle, prixVente, prixAchat, category)
   

    if($ajouterArticle){
        $result['message'] = "Article ajouté avec succes";
    }
    else{
        $result['error'] = true;
        $result['message'] = "Echec l'article n'a pas été ajouté";
    }
}


if($action=='update'){ // article id needed in database, sepoarate firstlibelle from lastlibelle
    $idArticleS=$_POST['idArticleS'];
    $libelle = $_POST['libelle'];
    $prixVente = $_POST['prixVente'];
    $prixAchat = $_POST['prixAchat'];
    $categorie = $_POST['category'];
   
    
    //$idArticleS= $conn->query("SELECT idArticleS from articlestock where libelle='$libelle'");
    $modifierArticle = $conn->query("UPDATE articlestock SET
    libelle='$libelle', prixVente= '$prixVente',prixAchat='$prixAchat', category='$categorie' WHERE idArticleS='$idArticleS'");
   
    if($modifierArticle){
        $result['message'] = "Article modifié avec succes";
        var_dump( $modifierArticle);
    }
    else{
        $result['error'] = true;
        $result['message'] = "Echec l'article n'a pas été modifié";
    }
    
}

if($action=='delete'){ // article id needed in database, sepoarate firstlibelle from lastlibelle
    $idArticleS = $_POST['idArticleS'];
   
    $supprimmerArticle = $conn->query("DELETE FROM articlestock WHERE idArticleS='$idArticleS'"); 
   

    if($modifierArticle){
        $result['message'] = "Article supprimé avec succes";
    }
    else{
        $result['error'] = true;
        $result['message'] = "Echec l'article n'a pas été supprimé";
    }
}
//echo json_encode($result['article']);
echo json_encode($result);



?>