var client = new Vue({
    el:'#app',
    data: {
        errorMsg: false,
        successMsg: false,
        showAddModal:false,
        showEditModal:false,
        showDeleteModal:false
    }
});

var article = new Vue({
    el:'#app2',
    data: {
        errorMsg: false,
        successMsg: false,
        showAddModal:false,
        showEditModal:false,
        showDeleteModal:false
    }
});