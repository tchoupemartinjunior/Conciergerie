<?php include 'menu.php'; ?>
<div class="col py-3">
  <!-- need to be change this id  -->
  <div id="app3">
    <div class="container">

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title ">Tableau de commandes</h5>
              
              <button type="button" class="btn btn-primary float-right" @click="showAddModal=true"><i class="fs bi-plus"></i>Créer une commande</button>
              <?php echo'<a href = "test.php"> <button class=" btn btn-warning">EXPORTER VERS EXCEL</button></a>'?>
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
                    <th scope="col">NUMERO_COMMANDE</th>
                    <th scope="col">NUMERO_CLIENT</th>
                    <th scope="col">DATE_COMMANDE</th>
                    <th scope="col">STATUS</th>

                    <th scope="col">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="text-left" v-for="commande in commandes">
                    <th scope="row">{{commande.idCommande}}</th>
                    <td>{{commande.numCommande}}</td>
                    <td>{{commande.codeClient}}</td>
                    <td>{{commande.dateCommande}}</td>
                    <td>{{commande.status}} </td>

                    <td>
                      <button class="btn btn-primary" @click="showEditModal=true;  selectCommande(commande);"><i class="fs bi-pencil"></i></button>
                      <button class="btn btn-danger" @click="showDeleteModal=true;  selectCommande(commande);"><i class="fs bi-trash"></i></button>
                     <?php echo'<a href="listArticle.php"> <button type="button" class="btn btn-success"><i class="fs8 bi-plus"></i></button></a>';?>
                     <button class="btn btn-secondary" @click="showListArticleModal=true; idComm=commande.idCommande;  getAllListArticle(); selectCommande(commande);"><i class="fs bi-eye"></i></button>
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
    <div id="overlay" v-if="showAddModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"> Ajouter une commande</h5>
            <button type="button" class="btn-close" aria-label="Close" @click="showAddModal=false;"></button>
          </div>
          <div class="modal-body">
            <form action="#" method="post">

              <div class="mb-3">
                <label for="message-text" class="col-form-label">Nom de salarié</label>
                <input type="text" name="numCommande" class="form-control" v-model="newCommande.numCommande">
                

              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Date de commande</label>
                <input type="date" name="dateCommande" class="form-control" v-model="newCommande.dateCommande">

              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Nom de client</label>
                <!-- Try to do autocomplete name of client -->
                <input type="text" name="nomClient" class="form-control" v-model="newCommande.nomClient" placeholder="Ex. Moulin"></input>

              </div>

              <div class="mb-3">
                <label for="message-text" class="col-form-label">Status:</label>
                <select class="form-control" id="inputGroupSelect01" v-model="newCommande.status">
                  <option selected>To buy</option>
                  <option value="1">Bought</option>
                  <option value="2">Packed</option>
                  <option value="3">Shipped</option>
                  <option value="4">Arrived</option>
                  <option value="5">Delivered</option>
                  <option value="6">Done</option>
                </select>
              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" @click="showAddModal=false">Fermer</button>
            <button type="button" class="btn btn-primary" @click=" addCommande() ; showAddModal=false;">Ajouter</button>

          </div>
        </div>
      </div>
    </div>

  <!--add commandeArticle modal-->
  <div id="overlay" v-if="showListArticleModal">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Consulter la commande "{{currentCommande.numCommande}}"</h5>
            <button type="button" class="btn-close" aria-label="Close" @click="showListArticleModal=false"></button>
          </div>
          <div class="modal-body">
          <table class="table datatable">
                <thead>
                  <tr>
    
                    <th scope="col">Libelle</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">PU</th>
                    <th scope="col">Remarque</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="text-left" v-for="list in listArticles">
                   
                    <td>{{list.libelle}}</td>
                    <td>{{list.quantite}}</td>
                    <td>{{list.prixUnitaire}} €</td>
                    <td>{{list.remarque}}</td>

                  </tr>
                </tbody>
          </table>
          </div>
       
          
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" @click="showListArticleModal=false">Génerer facture</button>
            <button type="button" class="btn btn-secondary" @click="showListArticleModal=false;">modifier</button>
          </div>
        </div>
      </div>
    </div>







<!--edit client modal-->
<div id="overlay" v-if="showEditModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modifier commande</h5>
            <button type="button" class="btn-close" aria-label="Close" @click="showEditModal=false"></button>
          </div>
          <div class="modal-body">
            <form action="#" method="post">
              <!-- <div class="mb-3">
                <label class="col-form-label">Libelle:</label>
                <input type="text" name="libelle" class="form-control" v-model="currentCommande.libelle">
              </div>
              <div class="mb-3">
                <label class="col-form-label">Prix de vente:</label>
                <input type="number" name="prixVente" class="form-control" v-model="currentCommande.prixVente">

              </div>
              <div class="mb-3">
                <label class="col-form-label">Prix d'achat:</label>
                <input type="number" name="prixAchat" class="form-control" v-model="currentCommande.prixAchat"></input>
              </div> -->

              <div class="mb-3">
                <label class="col-form-label">Status:</label>
                <!-- <input type="text" name="status" class="form-control" v-model="currentCommande.status"></input> -->
                <select class="form-control" id="inputGroupSelect01" v-model="currentCommande.status">
                  <option value="To buy" selected>To buy</option>
                  <option value="Bought">Bought</option>
                  <option value="Packed">Packed</option>
                  <option value="Shipped">Shipped</option>
                  <option value="Arrived">Arrived</option>
                  <option value="Delivered">Delivered</option>
                  <option value="Done">Done</option>
                </select>
              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" @click="showEditModal=false">Fermer</button>
            <button type="button" class="btn btn-primary" @click="showEditModal=false; updateCommande();">Modifier</button>
          </div>
        </div>
      </div>
    </div>
    <!--end edit client-->
    <!--supprimer client-->
    <div id="overlay" v-if="showDeleteModal">

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Supprimer commande</h5>
            <button type="button" class="btn-close" aria-label="Close" @click="showDeleteModal=false"></button>
          </div>
          <div class="modal-body">
            <p>Voulez vous vraiment supprimer "{{currentCommande.numCommande}}"?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" @click="showDeleteModal=false">Annuler</button>
            <button type="button" class="btn btn-danger" @click="showDeleteModal=false; deleteCommande();">Supprimer</button>
          </div>
        </div>

      </div>
    </div>
    <!--fin supprimer client-->
  </div>
</div>

</div>


<?php include 'footer.php'; ?>