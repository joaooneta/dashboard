$(window).on('load', () =>{
    $("#competencia").on('change', e => {
        let competencia = $(e.target).val();
        
        $.ajax({
            type:'GET',
            url:'app.php',
            data: `competencia=${competencia}`,
            dataType: 'json',
            success: obj => {
                console.log(obj);
                $('#numeroVendas').html(obj.numero_vendas);
                $('#totalVendas').html(obj.total_vendas);
                $('#clientesAtivos').html(obj.clientes_ativos);
                $('#clientesInativos').html(obj.clientes_inativos);
                $('#totalReclamacoes').html(obj.total_reclamacoes);
                $('#totalElogios').html(obj.total_elogios);
                $('#totalSugestoes').html(obj.total_sugestoes);
                $('#totalDespesas').html(obj.total_despesas);
            },
            error: erro => {console.log(erro)}
        });
    });
});
   