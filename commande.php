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
              <button type="button" class="btn btn-primary float-right" @click="showAddModal=true"><i class="fs bi-plus"></i></button>
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
                <input type="text" name="nomClient" class="form-control" v-model="newCommande.prixAchat" placeholder="Ex. Jean"></input>
              </div>

              <div class="mb-3">
                <label for="message-text" class="col-form-label">Status:</label>
                <!-- <input type="text" name="categorie" class="form-control" v-model="newCommande.categorie"></input> -->
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
            <button type="button" class="btn btn-primary" @click=" addArticle(); showAddModal=false;">Ajouter</button>
          </div>
        </div>
      </div>
    </div>

    <!--edit client modal-->
    <div id="overlay" v-if="showEditModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modifier article</h5>
            <button type="button" class="btn-close" aria-label="Close" @click="showEditModal=false"></button>
          </div>
          <div class="modal-body">
            <form action="#" method="post">
              <div class="mb-3">
                <label class="col-form-label">Libelle:</label>
                <input type="text" name="libelle" class="form-control" v-model="currentArticle.libelle">
              </div>
              <div class="mb-3">
                <label class="col-form-label">Prix de vente:</label>
                <input type="number" name="prixVente" class="form-control" v-model="currentArticle.prixVente">

              </div>
              <div class="mb-3">
                <label class="col-form-label">Prix d'achat:</label>
                <input type="number" name="prixAchat" class="form-control" v-model="currentArticle.prixAchat"></input>
              </div>

              <div class="mb-3">
                <label class="col-form-label">Categorie:</label>
                <input type="text" name="categorie" class="form-control" v-model="currentArticle.categorie"></input>
              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" @click="showEditModal=false">Fermer</button>
            <button type="button" class="btn btn-primary" @click="showEditModal=false; updateArticle();">Modifier</button>
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
            <h5 class="modal-title">Supprimer article</h5>
            <button type="button" class="btn-close" aria-label="Close" @click="showDeleteModal=false"></button>
          </div>
          <div class="modal-body">
            <p>Voulez vous vraiment supprimer "{{currentArticle.libelle}}"?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" @click="showDeleteModal=false">Annuler</button>
            <button type="button" class="btn btn-danger" @click="showDeleteModal=false; deleteArticle();">supprimer</button>
          </div>
        </div>

      </div>
    </div>
    <!--fin supprimer client-->
  </div>
</div>

</div>


<?php include 'footer.php'; ?>