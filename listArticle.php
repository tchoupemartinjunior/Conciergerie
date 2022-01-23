
<?php include 'menu_liste_article.php';?>
<div class="col-md-auto py-3 bg-dark" >
<div id="app4">
  
        <div class="container-fluid">
 
            <div class="row">
                <div class="col-lg-12">
                     <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Selectionnez les articles</h5>
                            
                            <div class="alert alert-danger" v-if="errorMsg">
                            {{errorMsg}}
                            </div> 
                            <div class="alert alert-success" v-if="successMsg">
                                {{successMsg}}
                            </div>
                            <table class="table table-sm">
                                <thead>
                                  <tr>
                                  <th scope="col"></th>
                                    <th scope="col">LIBELLE</th>
                                    <th scope="col">QUANTITE</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <tr  v-for ="article in articles">
                                      <form action="" method="post">
                                        <td>
                                          <input class="checkbox-xl" type= "checkbox" value="article.idArticleS" name="listArticle" v-model="article.checked">
                                        </td>
                                          <td>
                                          <label class="form-check-label text-right">{{article.libelle}}</label>
                                        </td>

                                        <td scope="row"><input type="number"  name="quantite" class="form-control" style="width:80px;"v-model="article.qte"></td>
                                    </form>
                                      </tr>
                                </tbody> 
                            </table>
                           
                          </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-lg btn-block" style="float: right;" @click ="addArticletoList();">Valider</button>
                        <button type="button" class="btn btn-primary btn-lg btn-block" style="float: left;" onclick="window.location.href='/conciergerie/commande.php'">Precedent</button>
                        
                    </div>
                </div>
            </div>
        </div>

</div>


<?php include 'footer.php';?>