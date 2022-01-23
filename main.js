
/**   debut client */


//var urlClient = "http://e-srv-lamp/s177672/bdd/Conciergerie/processClient.php?action=";
var urlClient= "http://localhost/conciergerie/processClient.php?action=";

//var urlArticle = "http://e-srv-lamp/s177672/bdd/Conciergerie/process2.php?action=";
var urlArticle= "http://localhost/conciergerie/process2.php?action=";


//var urlCommande = "http://e-srv-lamp/s177672/bdd/Conciergerie/processCommande.php?action=";
var urlCommande= "http://localhost/conciergerie/processCommande.php?action=";

var urlConcerne = "http://localhost/conciergerie/processConcerne.php?action=";
/*********************************CLIENTS********************** */
//variale for client - remplace with id of tab DIV
var app = new Vue({
    el: '#app',
    data: {
        errorMsg: "",
        successMsg: "",
        showAddModal: false,
        showEditModal: false,
        showDeleteModal: false,
        clients: [],
        newClient: { nomClient: "", prenomClient: "", adresse: "", facebook: "", instagram: "", email: "", telephone: "", points: "", nomMember: "" },
        currentClient: {},

    },
    mounted: function () {
        this.getAllClient();

    },
    methods: {

        getAllClient() {
            axios.get(urlClient + "read") 
               .then(function (response) {

                    if (response.data.error) {
                        app.errorMsg = response.data.message;
                    }
                    else {
                        app.clients = response.data.client;
                        console.log(app.clients);
                        console.log(response.data);
                    }

                })
        },

        addClient() {
            let formData = app.toFormData(app.newClient);
            axios.post(urlClient + "create", formData)
               .then(function (response) {

                    app.newClient = { nomClient: "", prenomClient: "", adresse: "", facebook: "", instagram: "", email: "", telephone: "", points: "", nomMember: "" };

                    if (response.data.error) {
                        app.errorMsg = response.data.message;
                        console.log(response.data);
                    }
                    else {
                        app.successMsg = response.data.message;
                        app.getAllClient();
                    }

                })
        },

        updateClient() {
            let formData = app.toFormData(app.currentClient);
            axios.post(urlClient + "update", formData)

                .then(function (response) {

                    app.currentClient = {};

                    if (response.data.error) {
                        app.errorMsg = response.data.message;

                    }
                    else {
                        app.successMsg = response.data.message;
                        app.getAllClient();
                        console.log(response.data);
                    }

                })
        },

        deleteClient() {
            let formData = app.toFormData(app.currentClient);
            axios.post(urlClient + "delete", formData)

                .then(function (response) {

                    app.currentClient = {};

                    if (response.data.error) {
                        app.errorMsg = response.data.message;
                    }
                    else {
                        app.successMsg = response.data.message;
                        app.getAllClient();
                        console.log(response.data);
                    }

                })
        },

        toFormData(obj) {
            var fd = new FormData();
            for (var i in obj) {
                fd.append(i, obj[i]);
            }
            return fd;
        },

        selectClient(client) {
            app.currentClient = client;
        }
    }

});
/*****************************FIN CLIENT******************************* */

/******************************ARTICLES********************************* */
var app2 = new Vue({

    el: '#app2',
    data: {
        errorMsg: "",
        successMsg: "",
        showAddModal: false,
        showEditModal: false,
        showDeleteModal: false,
        articles: [],
        newArticle: { libelle: "", prixVente: "", prixAchat: "", categorie: "" },
        currentArticle: {},

    },
    mounted: function () {
        this.getAllArticle();

    },
    methods: {

        getAllArticle() {
            axios.get(urlArticle + "read") //serveur de lensim
                //axios.get("http://localhost/conciergerie/process2.php?action=read")
                .then(function (response) {

                    if (response.data.error) {
                        app2.errorMsg = response.data.message;
                    }
                    else {
                        app2.articles = response.data.article;
                        console.log(app2.articles);
                    }

                })
        },

        addArticle() {
            let formData = app2.toFormData(app2.newArticle);
            axios.post(urlArticle + "create", formData)
                //axios.post("http://localhost/conciergerie/process2.php?action=create", formData)
                .then(function (response) {

                    app2.newArticle = { libelle: "", prixVente: "", prixAchat: "", categorie: "" };

                    if (response.data.error) {
                        app2.errorMsg = response.data.message;
                        console.log(response.data);
                    }
                    else {
                        app2.successMsg = response.data.message;
                        app2.getAllArticle();
                    }

                })
        },

        updateArticle() {
            let formData = app2.toFormData(app2.currentArticle);
            axios.post(urlArticle + "update", formData)

                .then(function (response) {

                    app2.currentArticle = {};

                    if (response.data.error) {
                        app2.errorMsg = response.data.message;

                    }
                    else {
                        app2.successMsg = response.data.message;
                        app2.getAllArticle();
                        console.log(response.data);
                    }

                })
        },

        deleteArticle() {
            let formData = app2.toFormData(app2.currentArticle);
            axios.post(urlArticle + "delete", formData)

                .then(function (response) {

                    app2.currentArticle = {};

                    if (response.data.error) {
                        app2.errorMsg = response.data.message;
                    }
                    else {
                        app2.successMsg = response.data.message;
                        app2.getAllArticle();
                        console.log(response.data);
                    }

                })
        },

        toFormData(obj) {
            var fd = new FormData();
            for (var i in obj) {
                fd.append(i, obj[i]);
            }
            return fd;
        },

        selectArticle(article) {
            app2.currentArticle = article;
        }
    }

});
/*******************************FIN ARTICLE********************************** */

/************************************COMMNADES**************************** */

var app3 = new Vue({

    el: '#app3',
    data: {
        errorMsg: "",
        successMsg: "",
        showAddModal: false,
        showEditModal: false,
        showDeleteModal: false,
        showListArticleModal: false,
        idComm:"",
        commandes: [],
        listArticles: [],
        //listArticle:{nom:"", numCommande:"",libelle:"",prixUnitaire:"",}
        newCommande: { numCommande: "", dateCommande: "", status: "", codeClient: "", nomClient: "" }, //need to take codeClient and nomClient from table "client"
        currentCommande: {},

    },
    mounted: function () {
     
        this.getAllCommande();
       

    },
    methods: {

        getAllCommande() {
            axios.get(urlCommande + "read") //serveur de lensim
                .then(function (response) {

                    if (response.data.error) {
                        app3.errorMsg = response.data.message;
                    }
                    else {
                        app3.commandes = response.data.commande;
                        console.log(app3.commandes);
                    }

                })
        },

        getAllListArticle() {
            axios.get(urlConcerne + "read&&idComm="+app3.idComm) //serveur de lensim
                .then(function (response) {

                    if (response.data.error) {
                        app3.errorMsg = response.data.message;
                    }
                    else {
                        app3.listArticles = response.data.listArticle;
                        console.log(app3.listArticles);
                    }

                })
        },

        addCommande() {
            let formData = app3.toFormData(app3.newCommande);
            axios.post(urlCommande + "create", formData)
                .then(function (response) {

                    app3.newCommande = { numCommande: "", dateCommande: "", status: "", codeClient: "",  nomClient: "" };
                    // app3.newCommande = { dateCommande: "", status: "", codeClient: "" };

                    if (response.data.error) {
                        app3.errorMsg = response.data.message;
                        console.log(response.data);
                    }
                    else {
                        app3.successMsg = response.data.message;
                        app3.getAllCommande();
                    }

                })
        },
        updateCommande() {
            let formData = app3.toFormData(app3.currentCommande);
            axios.post(urlCommande + "update", formData)

                .then(function (response) {

                    app3.currentCommande = {};

                    if (response.data.error) {
                        app3.errorMsg = response.data.message;

                    }
                    else {
                        app3.successMsg = response.data.message;
                        app3.getAllCommande();
                        console.log(response.data);
                    }

                })
        },

        deleteCommande() {
            let formData = app3.toFormData(app3.currentCommande);
            axios.post(urlCommande + "delete", formData)

                .then(function (response) {

                    app3.currentCommande = {};

                    if (response.data.error) {
                        app3.errorMsg = response.data.message;
                    }
                    else {
                        app3.successMsg = response.data.message;
                        app3.getAllCommande();
                        console.log(response.data);
                    }

                })
        },

        toFormData(obj) {
            var fd = new FormData();
            for (var i in obj) {
                fd.append(i, obj[i]);
            }
            return fd;
        },

        selectCommande(commande) {
            app3.currentCommande = commande;
        }
    }

});

/*********************LIST ARTICLE POUR COMMANDE (CONCERNE) */
var app4 = new Vue({

el: '#app4',
data: {
    errorMsg: "",
    successMsg: "",
    showAddModal: false,
    showEditModal: false,
    showDeleteModal: false,
    articles: [{qte:"", checked:true}],
    newArticle: { libelle: "", prixVente: "", prixAchat: "", categorie: "" },
    currentArticle: {},
    listArticles: [],
    newListArticles: {listArticle:"",qte:""},

},
mounted: function () {
    this.getAllArticle();

},
methods: {

    getAllArticle() {
        axios.get(urlArticle + "read") //serveur de lensim
            //axios.get("http://localhost/conciergerie/process2.php?action=read")
            .then(function (response) {

                if (response.data.error) {
                    app4.errorMsg = response.data.message;
                }
                else {
                    app4.articles = response.data.article;
                    console.log(app4.articles);
                }

            })
    },

    addArticletoList() {
        let formData = app4.toFormData(app4.newListArticles);console.log(formData);
        axios.post(urlConcerne  + "create", formData)
            //axios.post("http://localhost/conciergerie/process2.php?action=create", formData)
            .then(function (response) {

                app4.newListArticles= {listArticle:"",quantite:""};

                if (response.data.error) {
                    app4.errorMsg = response.data.message;
                    console.log(response.data);
                }
                else {
                    app4.successMsg = response.data.message;
                    app4.getAllArticle();
                }

            })
    },

    updateArticle() {
        let formData = app4.toFormData(app4.currentArticle);
        axios.post(urlArticle + "update", formData)

            .then(function (response) {

                app4.currentArticle = {};

                if (response.data.error) {
                    app4.errorMsg = response.data.message;

                }
                else {
                    app4.successMsg = response.data.message;
                    app4.getAllArticle();
                    console.log(response.data);
                }

            })
    },

    deleteArticle() {
        let formData = app4.toFormData(app4.currentArticle);
        axios.post(urlArticle + "delete", formData)

            .then(function (response) {

                app4.currentArticle = {};

                if (response.data.error) {
                    app4.errorMsg = response.data.message;
                }
                else {
                    app4.successMsg = response.data.message;
                    app4.getAllArticle();
                    console.log(response.data);
                }

            })
    },

    toFormData(obj) {
        var fd = new FormData();
        for (var i in obj) {
            fd.append(i, obj[i]);
        }
        return fd;
    },

    selectArticle(article) {
        app4.currentArticle = article;
    }
}

});