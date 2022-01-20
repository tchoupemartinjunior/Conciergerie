
<?php include 'menu.php';?>
<div class="col py-3">
    <div id="app2">
        <div class="container">
 
            <div class="row">
                <div class="col-lg-12">
                     <div class="card">
                        <div class="card-body">
                            <h5 class="card-title ">Tableau d'articles</h5>
                            <button type="button" class="btn btn-primary float-right" @click="showAddModal=true" ><i class="fs bi-plus"></i> Ajouter un article</button>
                            <div class="alert alert-danger" v-if="errorMsg">
                            {{errorMsg}}
                            </div> 
                            <div class="alert alert-success" v-if="successMsg">
                                {{successMsg}}
                            </div>
                            <table class="table datatable">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">LIBELLE</th>
                                    <th scope="col">PRIX_DE_VENTE</th>
                                    <th scope="col">PRIX_D'ACHAT</th>
                                    <th scope="col">CATEGORIE</th>
                                    <th scope="col">ACTION</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center" v-for ="article in articles">
                                      <th scope="row">{{article.idArticle}}</th>
                                      <td>{{article.libelle}}</td>
                                      <td>{{article.prixVente}} €</td>
                                      <td>{{article.prixAchat}} €</td>
                                      <td>{{article.category}}</td>
                                      <td>
                                          <button class="btn btn-primary"  @click="showAddModal=true"><i class="fs bi-pencil"></i></button>
                                          <button class="btn btn-danger"@click="showDeleteModal=true"><i class="fs bi-trash"></i></button>
                                      </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--add article modal-->
        <div id="overlay" v-if= "showAddModal">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Ajouter un article</h5>
              <button type="button" class="btn-close"  aria-label="Close" @click="showAddModal=false;"></button>
            </div>
            <div class="modal-body">
              <form action="#" method="post">
                <div class="mb-3">
                  <label  class="col-form-label">Libelle:</label>
                  <input type="text" name ="libelle" class="form-control" v-model="newArticle.libelle">
                </div>
                <div class="mb-3">
                  <label class="col-form-label">Prix de vente:</label>
                  <input type="number" name ="prixVente" class="form-control" v-model="newArticle.prixVente">

                </div>
                <div class="mb-3">
                  <label  class="col-form-label">Prix d'achat:</label>
                  <input type="number" name ="prixAchat" class="form-control" v-model="newArticle.prixAchat"></input>
                </div>

                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Categorie:</label>
                  <input type="text" name ="category" class="form-control" v-model="newArticle.category"></input>
                </div>
       
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" @click="showAddModal=false">Fermer</button>
              <button type="button" class="btn btn-primary"   @click=" addArticle(); showAddModal=false;">Ajouter</button>
            </div>
          </div>
        </div>
    </div>

     <!--edit client modal-->
     <div id="overlay" v-if= "showEditModal">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="btn-close"  aria-label="Close" @click="showAddModal=false"></button>
            </div>
            <div class="modal-body">
              <form action="#" method="post">
                <div class="mb-3">
                  <label  class="col-form-label">Libelle:</label>
                  <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Prix de vente:</label>
                  <input type="number" class="form-control">

                </div>
                <div class="mb-3">
                  <label  class="col-form-label">Prix s'achat:</label>
                  <input type="number" class="form-control"></input>
                </div>

                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Categorie:</label>
                  <select class="form-select" aria-label="Default select example">
                        <option selected>choisir la categorie</option>
                        <option value="1">Parfum</option>
                        <option value="2">creme</option>
                        <option value="3">outils</option>
                    </select>
                </div>
       
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" @click="showAddModal=false">Fermer</button>
              <button type="button" class="btn btn-primary">Ajouter</button>
            </div>
          </div>
        </div>
    </div>
    <!--end edit client-->
    <!--supprimer client-->
    <div id="overlay" v-if= "showDeleteModal">
   
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Supprimer article</h5>
              <button type="button" class="btn-close" aria-label="Close" @click="showDeleteModal=false"></button>
            </div>
            <div class="modal-body">
              <p>Voulez vous vraiment supprimer cet article?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" @click="showDeleteModal=false">Annuler</button>
              <button type="button" class="btn btn-danger">supprimer</button>
            </div>
          </div>
        
      </div>
    </div>
 <!--fin supprimer client-->
   </div>
    </div>
            
</div>


<?php include 'footer.php';?>