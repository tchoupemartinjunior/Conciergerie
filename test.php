<?php
require_once('connectdb.php');
?>
<html>  
 <head>  
  <title>Export MySQL data to Excel in PHP</title>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
 </head>  
 <body>  
  <div class="container">  
   <br />  
   <br />  
   <br />  
   <div class="table-responsive">  
    <h2 align ="center">Exporter la table de commande vers Excel</h2><br /> 
    <table class="table table-bordered">
     <tr>  
                        <th>N° Commande</th>  
                        <th>Client</th>  
                        <th>Code Client</th>  
                        <th>Date Commande</th>
                        <th>Articles</th>
                        <th>Points</th>
      </tr>
     <?php
     $query = "SELECT numCommande,CONCAT(prenomClient, ' ',nomClient) as nom,codeClient, dateCommande, CONCAT(quantite,' x ',libelle,' PU :  ',prixUnitaire,'€ Total : ',prixUnitaire*quantite,' €') as article,points, status from commande  natural join client natural join concerne natural join article order by dateCommande;";
     $result =  $conn->query($query);
     while($row = mysqli_fetch_array($result))  
     {  
        echo '  
       <tr>  
                <td>'.$row["numCommande"].'</td>  
                <td>'.$row["nom"].'</td>  
                <td>'.$row["codeClient"].'</td>  
                <td>'.$row["dateCommande"].'</td> 
                <td>'.$row["article"].'</td> 
                <td>'.$row["points"].'</td>  
           
       </tr>  
        ';  
     }
     ?>
    </table>
    <br />
                           
    <form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-block btn-success" value="Exporter"/>
    </form>
    <button type="button" class="btn btn-primary btn-lg " style="float: left;" onclick="window.location.href='/conciergerie/commande.php'">Precedent</button>

   </div>  
  </div>  
 </body>  
</html>