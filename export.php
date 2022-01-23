<?php  
//export.php  
require_once('connectdb.php');
$output = '';
if(isset($_POST["export"]))
{
    $query = "SELECT numCommande,CONCAT(prenomClient, ' ',nomClient) as nom,codeClient, dateCommande, CONCAT(quantite,' x ',libelle,' PU :  ',prixUnitaire,'€ Total : ',prixUnitaire*quantite,' €') as article,points, status from commande  natural join client natural join concerne natural join article order by dateCommande;";
    $result =  $conn->query($query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   
                    <tr>  
                    <th>N° Commande</th>  
                    <th>Client</th>  
                    <th>Code Client</th>  
                    <th>Date Commande</th>
                    <th>Articles</th>
                    <th>Points</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
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
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Commande.xls');
  echo $output;
 }
}
?>