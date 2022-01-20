


var client = new Vue({
    el:'#app',
    data: {
        errorMsg: "",
        successMsg: "",
        showAddModal:false,
        showEditModal:false,
        showDeleteModal:false
    }
});

var app2 = new Vue({
    
    el:'#app2',
    data: {
        errorMsg: "",
        successMsg: "",
        showAddModal:false,
        showEditModal:false,
        showDeleteModal:false,
        articles: [],
        newArticle :{libelle:"", prixVente:"", prixAchat:"", category:""},
        currentArticle: {}
    },
    mounted: function(){
        this.getAllArticle();
        
    },
    methods:{

        getAllArticle(){
            //axios.get("http://e-srv-lamp/s177672/bdd/Conciergerie/process2.php?action=read") serveur de lensim
             axios.get("http://localhost/conciergerie/process2.php?action=read")
            .then(function(response){

                if(response.data.error){
                    app2.errorMsg = response.data.message;
                }
                else{
                    app2.articles= response.data.article;
                    console.log(app2.articles);
                }
                
                })         
        },

        addArticle(){
            let formData = app2.toFormData(app2.newArticle);
           // axios.get("http://e-srv-lamp/s177672/bdd/Conciergerie/process2.php?action=create",formData)
           axios.post("http://localhost/conciergerie/process2.php?action=create", formData)
           .then(function(response){

                app2.newArticle = {libelle:"", prixVente:"", prixAchat:"", category:""};

                if(response.data.error){
                    app2.errorMsg = response.data.message;
                    console.log(response.data);
                }
                else{
                    app2.successMsg = response.data.message;
                    app2.getAllArticle();
                }
                
                })       
        },
        toFormData(obj){
            var fd = new FormData();
            for(var i in obj){
                fd.append(i,obj[i]);
            }
            return fd;
        },
    }
    
});