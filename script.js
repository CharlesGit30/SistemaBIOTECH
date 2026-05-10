$(document).ready(function () {

    $('#tabela').DataTable({

        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/pt-BR.json'
        },

        pageLength: 10
    });

});


const configTabela = {
    columnDefs: [
        { targets: 0, orderData: [0, 1] },
        { targets: 1, orderData: [1, 0] },
        { targets: 4, orderData: [4, 0] }
    ]
};

new DataTable('#tabela1', configTabela);
new DataTable('#tabela2', configTabela);