
<?php include 'menu.php';?>
<div class="col py-3">
    <div id="app">
        <div class="container">
 
            <div class="row">
                <div class="col-lg-12">
                     <div class="card">
                        <div class="card-body">
                            <h5 class="card-title ">Tableau des clients</h5>
                            <button type="button" class="btn btn-primary float-right" @click="showAddModal=true" ><i class="fs bi-plus"></i> Ajouter un client</button>
                            <div class="alert alert-danger" v-if="errorMsg">
                            Erreur
                            </div> 
                            <div class="alert alert-success" v-if="successMsg">
                                success
                            </div>
                            <table class="table datatable">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NOM</th>
                                    <th scope="col">E-MAIL</th>
                                    <th scope="col">TELEPHONE</th>
                                    <th scope="col">FACEBOOK</th>
                                    <th scope="col">ACTION</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      <th scope="row">1</th>
                                      <td>Richard Ibrahim</td>
                                      <td>riib@gmail.com</td>
                                      <td>758986213</td>
                                      <td>Gold</td>
                                      <td>
                                         <button class="btn btn-primary"  @click="showAddModal=true"><i class="fs bi-pencil"></i></button>
                                          <button class="btn btn-danger"@click="showDeleteModal=true"><i class="fs bi-trash"></i></button>
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
                  <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                  <label  class="col-form-label">E-mail:</label>
                  <input type="text" class="form-control">

                </div>
                <div class="mb-3">
                  <label  class="col-form-label">Téléphone:</label>
                  <input type="text" class="form-control"></input>
                </div>

                <div class="mb-3">
                  <label  class="col-form-label">FACEBOOK:</label>
                  <input type="text" class="form-control">

                </div>
                <div class=" mb-3">
                  <label  class="col-form-label">Adresse:</label><br>
                  
                  <div class="input-group mb-3">
                    <label  class="col-form-label">N°:</label>
                    <input type="text" class="form-control form-sm">

                    <label  class="col-form-label">Rue:</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="input-group mb-3">
                    <label  class="col-form-label">Code postal:</label>
                    <input type="text" class="form-control">
                    <label  class="col-form-label">Ville:</label>
                    <input type="text" class="form-control">
                  </div>
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
                  <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                  <label  class="col-form-label">E-mail:</label>
                  <input type="text" class="form-control">

                </div>
                <div class="mb-3">
                  <label  class="col-form-label">Téléphone:</label>
                  <input type="text" class="form-control"></input>
                </div>

                <div class="mb-3">
                  <label class="col-form-label">FACEBOOK:</label>
                  <input type="text" class="form-control">

                </div>
                
                <div class=" mb-3">
                  <label  class="col-form-label">Adresse:</label><br>
                  
                  <div class="input-group mb-3">
                    <label  class="col-form-label">N°:</label>
                    <input type="text" class="form-control form-sm">

                    <label  class="col-form-label">Rue:</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="input-group mb-3">
                    <label  class="col-form-label">Code postal:</label>
                    <input type="text" class="form-control">
                    <label  class="col-form-label">Ville:</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" @click="showEditModal=false">Fermer</button>
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
              <h5 class="modal-title">Supprimer client</h5>
              <button type="button" class="btn-close" aria-label="Close" @click="showDeleteModal=false"></button>
            </div>
            <div class="modal-body">
              <p>Voulez vous vraiment supprimer ce client?</p>
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