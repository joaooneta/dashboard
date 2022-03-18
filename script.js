$(window).on('load', () =>{
    $("#documentacao").on('click', () =>{
        $('#conteudos').load('documentacao.html');
    });

    $("#suporte").on('click', () =>{
        $('#conteudos').load('suporte.html');
    });

    $("#competencia").on('change', e => {
        //Captura valor selecionado pelo usuário no select
        let competencia = $(e.target).val();
        
        //Requisição AJAX a página app.php que recupera os dados do banco em formato de um objeto JSON
        $.ajax({
            type:'GET',
            url:'app.php',
            data: `competencia=${competencia}`,
            dataType: 'json',
            //Caso sucesso exibi os valores ao usuário na interface gráfica
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
   