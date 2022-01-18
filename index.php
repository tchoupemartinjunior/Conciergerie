
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div id="app">
        <div class="container">
 
            <div class="row">
                <div class="col-lg-12">
                     <div class="card">
                        <div class="card-body">
                            <h5 class="card-title ">Tableau des clients</h5>
                            <button type="button" class="btn btn-primary float-right" @click="showAddModal=true" >Ajouter un plat</button>
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
                                    <th scope="col">CATEGORIE</th>
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
                                          <button class="btn btn-primary"  @click="showAddModal=true">modifier</button>
                                          <button class="btn btn-danger"@click="showDeleteModal=true">supprimer</button>
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
                  <label for="recipient-name" class="col-form-label">Nom:</label>
                  <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">E-mail:</label>
                  <input type="text" class="form-control">

                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Téléphone:</label>
                  <input type="text" class="form-control"></input>
                </div>

                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Categorie:</label>
                  <input type="text" class="form-control" id="recipient-name">

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
                  <label for="recipient-name" class="col-form-label">Nom:</label>
                  <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">E-mail:</label>
                  <input type="text" class="form-control">

                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Téléphone:</label>
                  <input type="text" class="form-control"></input>
                </div>

                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Categorie:</label>
                  <input type="text" class="form-control" id="recipient-name">

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
            



    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script type="text/javascript" src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>