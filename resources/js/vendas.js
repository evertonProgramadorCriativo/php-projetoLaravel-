$(document).ready(function() {
    // Busca de clientes
    $('#buscaCliente').keyup(function() {
        var termo = $(this).val();
        if(termo.length > 2) {
            $.get('/clientes/buscar', { termo: termo }, function(data) {
                $('#resultadosClientes').html(data);
            });
        }
    });
    
    // Adicionar produto
    $('#btnAddProduto').click(function() {
        // Lógica para adicionar produto à tabela
    });
    
    // Calcular parcelas
    $('#parcelamento').change(function() {
        // Lógica para cálculo de parcelas
    });
});