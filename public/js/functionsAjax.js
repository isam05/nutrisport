


//cadastro cliente
$(document).ready(function () {
    $("#btnCadastrarCliente").on('click touchstart', function () {
        var form = document.getElementById('formCadastrarCliente');
        $.ajax({
            type: 'POST',
            url: '/ajaxCadCliente',
            data: {
                nome: form.nome.value,
                cpf: form.cpf.value,
                telefone: form.telefone.value,
                email: form.email.value,
                login: form.login.value,
                senha: form.senha.value
            },
            success: function (data) {
                $('#retornoValidacao').html(data);
            },
            error: function (data) {
                $('#retornoValidacao').html(data);
            }
        })
    })
})

$(document).ready(function () {
    $("#btnCadastrarProd").on('click touchstart', function () {
        var form = document.getElementById('formCadastrarProd');
        $.ajax({
            type: 'POST',
            url: '/ajaxCadProd',
            data: {
                nome: form.nome.value,
                descricao: form.descricao.value,
                preco: form.preco.value
                
            },
            success: function (data) {
                $('#retornoValidacaoProd').html(data);
            },
            error: function (data) {
                $('#retornoValidacaoProd').html(data);
            }
        })
    })
})






//cadastro modalidade
$(document).ready(function () {
    $("#botaoCadModalidade").on('click touchstart', function () {
        var form = document.getElementById('formCadastrarModalidade');
        $.ajax({
            type: 'POST',
            url: '/ajaxCadModalidade',
            data: {
                categoria: form.categoria.value,
                descricao: form.descricao.value,
                preco: form.preco.value,
                vagas: form.vagas.value,
                imagemMod: form.imagemMod.value
               
            },
            success: function (data) {
                $('#retornoValidacaoMod').html(data);
            },
            error: function (data) {
                $('#retornoValidacaoMod').html(data);
            }
        })
    })
})





//cadastro planos
$(document).ready(function () {
    $("#botaoCadPlano").on('click touchstart', function () {
        
        var form = document.getElementById('formCadastrarPlano');
        
        $.ajax({
            type: 'POST',
            url: '/ajaxCadPlano',
            data: {
                tipo: form.tipo.value,
                descricao: form.descricao.value,
                duracao: form.duracao.value,
                preco: form.preco.value,
                convenio: form.convenio.value,
                imagemPlano: form.imagemPlano.value
                
            },
            success: function (data) {
              
                $('#retornoValidacaoPlano').html(data);
            },
            error: function (data) {
        
                $('#retornoValidacaoPlano').html(data);
            }
        }) 
    })
})


//login 
$(document).ready(function () {
    $('#botaoLogin').on('click touchstart', function () {
        var form = document.getElementById('formLogin');      
        $.ajax({
//            type: 'POST',
//            url: '/validaLogin',
            data: {
                acao: 'login',
                login: form.login.value,
                senha: form.senha.value
            },
            success: function (data) {
                $('#retorno').html(data);
            },
            beforeSend: function () {
                $('#processando').css({display: 'inline'});
            },
            complete: function () {
                $('#processando').css({display: 'none'});
            },
            error: function (evento, request, settings) {
                alert(settings);
            }
        });
    });
});