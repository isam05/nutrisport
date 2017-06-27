//manutenção cli
$(document).ready(function () {
    $('#alterarEexcluir').on('click touchstart', function () {
        window.location.href = "/editarCliente";
    });
});


$(document).ready(function () {
    $('#botaoAlterarCli').on('click touchstart', function () {
        var form = document.getElementById('formEditarCadastroCli');

        form.nome.disabled = false;
        form.cpf.disabled = false;
        form.telefone.disabled = false;
        form.email.disabled = false;

        form.botaoExcluirCli.disabled = true;
        form.botaoSalvarCli.disabled = false;
        form.botaoCancelarCli.disabled = false;
    });
});


$(document).ready(function () {
    $('#botaoCancelarCli').on('click touchstart', function () {
        var form = document.getElementById('formEditarCadastroCli');
        window.location.href = "/indexCliente";
    });
});

$(document).ready(function () {
    $('#botaoExcluirCli').on('click touchstart', function () {
        var form = document.getElementById('formEditarCadastroCli');
        if (confirm(" Deseja Excluir o seu Cadastro ?")) {
            $.ajax({
                type: 'POST',
                url: '/ajaxExcluirCliente',
                data: {
                    id: form.botaoExcluirCli.value
                },
                success: function (data) {
                    $('#retornoValidacao').html(data.toString());
                },
                error: function (data) {
                    $('#retornoValidacao').html(data.toString());
                }
            });
        }
    });
});

$(document).ready(function () {
    $('#botaoSalvarCli').on('click touchstart', function () {

        var form = document.getElementById('formEditarCadastroCli');
        $.ajax({
            type: 'POST',
            url: '/ajaxAlterarCliente',
            data: {
                nome: form.nome.value,
                cpf: form.cpf.value,
                telefone: form.telefone.value,
                email: form.email.value
            },
            success: function (data) {
                $('#retornoValidacao').html(data.toString());
            },
            error: function (data) {
                $('#retornoValidacao').html(data.toString());
            }
        });
    });
});


//manutenção modalidade


$(document).ready(function () {
    $('#btnBuscarMod').on('click touchstart', function () {
        var form = document.getElementById('formEditarCadastroMod');
        $.ajax({
            type: 'POST',
            url: '/buscarModalidade',
            data: {
                idModalidade: form.idModalidade.value
            },
            success: function (data) {
                var res = data.split("#")
                form.categoria.value = res[0];
                form.descricao.value = res[1];
                form.preco.value = res[2];
                form.vagas.value = res[3];
                form.imagemMod.value = res[4];
                

                form.btnAlterarMod.disabled = false;
                form.btnExcluirMod.disabled = false;
            },
            error: function (data) {
                $('#retornoValidacaoMod2').html(data.toString());
            }
        })
    });
});

$(document).ready(function () {
    $('#btnAlterarMod').on('click touchstart', function () {
        var form = document.getElementById('formEditarCadastroMod');

        form.categoria.disabled = false;
        form.descricao.disabled = false;
        form.preco.disabled = false;
        form.vagas.disabled = false;
        form.imagemMod.disabled = false;

        form.botaoExcluirMod.disabled = true;
        form.botaoSalvarMod.disabled = false;
        form.botaoCancelarMod.disabled = false;
    });
});

$(document).ready(function () {
    $('#btnExcluirMod').on('click touchstart', function () {
        var form = document.getElementById('formEditarCadastroMod');
        if (confirm("Deseja Excluir?")) {
            $.ajax({
                type: 'POST',
                url: '/ajaxExcluirMod',
                data: {
                    idModalidade: form.idModalidade.value
                },
                success: function (data) {
                    $('#retornoValidacaoMod2').html(data.toString());

                },
                error: function (data) {
                    $('#retornoValidacaoMod2').html(data.toString());

                }
            });
        }
    });
});

$(document).ready(function () {
    $('#btnSalvarMod').on('click touchstart', function () {

        var form = document.getElementById('formEditarCadastroMod');
        $.ajax({
            type: 'POST',
            url: '/ajaxAlterarMod',
            data: {
                idModalidade: form.idModalidade.value,
                tipo: form.tipo.value,
                descricao: form.descricao.value,              
                preco: form.preco.value,
                vagas: form.vagas.value,
                imagemMod: form.imagemMod.value,
            },
            success: function (data) {
                $('#retornoValidacaoMod2').html(data.toString());
            },
            error: function (data) {
                $('#retornoValidacaoMod2').html(data.toString());
            }
        });
    });
});






//manutenção plano
$(document).ready(function () {
    $('#alterarEexcluir').on('click touchstart', function () {
        window.location.href = "/editarPlano";
    });
});


$(document).ready(function () {
    $('#botaoAlterarPlano').on('click touchstart', function () {
        var form = document.getElementById('formEditarCadastroPlano');

        form.tipo.disabled = false;
        form.descricao.disabled = false;
        form.duracao.disabled = false;
        form.preco.disabled = false;
        form.convenio.disabled = false;
        form.imagemPlano.disabled = false;

        form.botaoExcluirPlano.disabled = true;
        form.botaoSalvarPlano.disabled = false;
        form.botaoCancelarPlano.disabled = false;
    });
});


$(document).ready(function () {
    $('#botaoCancelarPlano').on('click touchstart', function () {
        var form = document.getElementById('formEditarCadastroPlano');
        window.location.href = "/indexAdmin";
    });
});

$(document).ready(function () {
    $('#botaoExcluirPlano').on('click touchstart', function () {
        var form = document.getElementById('formEditarCadastroPlano');
        if (confirm(" Deseja Excluir o seu Cadastro ?")) {
            $.ajax({
                type: 'POST',
                url: '/ajaxExcluirPlano',
                data: {
                    id: form.botaoExcluirPlano.value
                },
                success: function (data) {
                    $('#retornoValidacao').html(data.toString());
                },
                error: function (data) {
                    $('#retornoValidacao').html(data.toString());
                }
            });
        }
    });
});

$(document).ready(function () {
    $('#botaoSalvarPlano').on('click touchstart', function () {

        var form = document.getElementById('formEditarCadastroPlano');
        $.ajax({
            type: 'POST',
            url: '/ajaxAlterarPlano',
            data: {
                tipo: form.tipo.value,
                descricao: form.descricao.value,
                duracao: form.duracao.value,
                preco: form.preco.value,
                convenio: form.convenio.value,
                imagemMod: form.imagemMod.value,
            },
            success: function (data) {
                $('#retornoValidacao').html(data.toString());
            },
            error: function (data) {
                $('#retornoValidacao').html(data.toString());
            }
        });
    });
});
