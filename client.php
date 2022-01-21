
<?php include 'menu.php';?>
<div class="col py-3">
    <div id="app">
        <div class="row">
 
            <div class="row">
                <div class="col">
                     <div class="card">
                        <div class="card-body">
                            <h5 class="card-title ">Tableau des clients</h5>
                            <button type="button" class="btn btn-primary float-right" @click="showAddModal=true" ><i class="fs bi-plus"></i> Ajouter un client</button>
                            <div class="alert alert-danger" v-if="errorMsg">
                            {{errorMsg}}
                            </div> 
                            <div class="alert alert-success" v-if="successMsg">
                            {{successMsg}}
                            </div>
                            <table class="table ">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">CODE</th>
                                    <th scope="col">NOM</th>
                                    <th scope="col">E-MAIL</th>
                                    <th scope="col">ADRESSE</th>
                                    <th scope="col">TELEPHONE</th>
                                    <th scope="col">FACEBOOK</th>
                                    <th scope="col">POINTS</th>
                                    <th scope="col">ACTION</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-left" v-for ="client in clients">
                                      <th scope="row">{{client.idClient}}</th>
                                      <td>{{client.codeClient}}</td>
                                      <td>{{client.nom}}</td>
                                      <td>{{client.email}}</td>
                                      <td>{{client.adresse}}</td>
                                      <td>{{client.telephone}}</td>
                                      <td>{{client.facebook}}</td>
                                      <td>{{client.points}}</td>
                                      <td>
                                          <button class="btn btn-primary"  @click="showEditModal=true; selectClient(client);"><i class="fs bi-pencil"></i></button>
                                          <button class="btn btn-danger"@click="showDeleteModal=true;  selectClient(client);"><i class="fs bi-trash"></i></button>
                                          <button class="btn btn-success"  @click="showAddModal=true"><i class="fs bi-card-list"></i></button>
                                       
                                      </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--add client modal-->
        <div id="overlay" v-if= "showAddModal">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Ajouter un Client</h5>
              <button type="button" class="btn-close"  aria-label="Close" @click="showAddModal=false"></button>
            </div>
            <div class="modal-body">
              <form action="#" method="post">
                <div class="mb-3">
                  <label class="col-form-label">Nom:</label>
                  <input type="text" name="nomClient" class="form-control" v-model="newClient.nomClient">
                </div>

                <div class="mb-3">
                  <label class="col-form-label">Prenom:</label>
                  <input type="text" name="prenomClient" class="form-control" v-model="newClient.prenomClient">
                </div>

                <div class="mb-3">
                  <label  class="col-form-label">E-mail:</label>
                  <input type="text"  name="email" class="form-control"  v-model="newClient.email">

                </div>
                <div class="mb-3">
                  <label  class="col-form-label">Téléphone:</label>
                  <input type="text" name="telephone" class="form-control"  v-model="newClient.telephone"></input>
                </div>

                <div class="mb-3">
                  <label  class="col-form-label">facebook:</label>
                  <input type="text" name="facebook"class="form-control"  v-model="newClient.facebook">
                </div>

                <div class=" mb-3">
                  <label  class="col-form-label">adresse:</label><br>
                  <input type="text" name="adresse" class="form-control"  v-model="newClient.adresse">
                </div>
       
              </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" @click="showAddModal=false">Fermer</button>
            <button type="button" class="btn btn-primary"   @click=" addClient(); showAddModal=false;">Ajouter</button>
            </div>
          </div>
        </div>
    </div>

     <!--edit client modal-->
     <div id="overlay" v-if= "showEditModal">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modifier Client</h5>
              <button type="button" class="btn-close"  aria-label="Close" @click="showEditModal=false"></button>
            </div>
            <div class="modal-body">
              <form action="#" method="post">
                <div class="mb-3">
                  <label  class="col-form-label">Nom:</label>
                  <input type="text" class="form-control" v-model="currentClient.nomClient">
                </div>
                <div class="mb-3">
                  <label class="col-form-label">Prenom:</label>
                  <input type="text" class="form-control" v-model="currentClient.prenomClient">
                </div>

                <div class="mb-3">
                  <label  class="col-form-label">E-mail:</label>
                  <input type="text" class="form-control" v-model="currentClient.email">

                </div>
                <div class="mb-3">
                  <label  class="col-form-label">Téléphone:</label>
                  <input type="text" class="form-control" v-model="currentClient.telephone"></input>
                </div>

                <div class="mb-3">
                  <label class="col-form-label">Facebook:</label>
                  <input type="text" class="form-control" v-model="currentClient.facebook">

                </div>
                
                <div class=" mb-3">
                  <label  class="col-form-label">Adresse:</label>
                  <input type="text" name="adresse" class="form-control" v-model="currentClient.adresse">
                </div>
              
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" @click="showEditModal=false">Fermer</button>
              <button type="button" class="btn btn-primary" @click="showEditModal=false; updateClient();">Modifier</button>
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
              <h5 class="modal-title">Supprimer client</h5>
              <button type="button" class="btn-close" aria-label="Close" @click="showDeleteModal=false"></button>
            </div>
            <div class="modal-body">
              <p>Voulez vous vraiment supprimer ce client?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" @click="showDeleteModal=false">Annuler</button>
              <button type="button" class="btn btn-danger" @click="showDeleteModal=false; deleteClient();">supprimer</button>
            </div>
          </div>
        
      </div>
    </div>
 <!--fin supprimer client-->
   </div>
    </div>
            
</div>


<?php include 'footer.php';?>