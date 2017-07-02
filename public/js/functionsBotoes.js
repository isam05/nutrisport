
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






$(document).ready(function () {
    $('#alterarEexcluir').on('click touchstart', function () {
        window.location.href = "/editarModalidade";
    });
});



$(document).ready(function () {
    $('#botaoBuscarMod').on('click touchstart', function () {
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
                

                form.botaoAlterarMod.disabled = false;
                form.botaoExcluirMod.disabled = false;
            },
            error: function (data) {
                $('#retornoValidacaoMod2').html(data.toString());
            }
        })
    });
});

$(document).ready(function () {
    $('#botaoAlterarMod').on('click touchstart', function () {
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
    $('#botaoExcluirMod').on('click touchstart', function () {
        var form = document.getElementById('formEditarCadastroMod');
        if (confirm("Excluir Cadastro da Modalidade?")) {
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
    $('#botaoSalvarMod').on('click touchstart', function () {

        var form = document.getElementById('formEditarCadastroMod');
        $.ajax({
            type: 'POST',
            url: '/ajaxAlterarMod',
            data: {
                idModalidade: form.idModalidade.value,
                categoria: form.categoria.value,
                descricao: form.descricao.value,              
                preco: form.preco.value,
                vagas: form.vagas.value,
                imagemMod: form.imagemMod.value
            },
            success: function (data) {
                alert(data);
            },
            error: function (data) {
                alert(data);
            }
        });
    });
});






$(document).ready(function () {
    $('#alterarEexcluir').on('click touchstart', function () {
        window.location.href = "/editarPlano";
    });
});

$(document).ready(function () {
    $('#botaoBuscarPlano').on('click touchstart', function () {
        var form = document.getElementById('formEditarCadastroPlano');
        $.ajax({
            type: 'POST',
            url: '/buscarPlano',
            data: {
                idPlano: form.idPlano.value
            },
            success: function (data) {
                var res = data.split("#")
                form.tipo.value = res[0];
                form.descricao.value = res[1];
                form.duracao.value = res[2];
                form.preco.value = res[3];
                form.convenio.value = res[4];
                form.imagemPlano.value = res[5];
                

                form.botaoAlterarPlano.disabled = false;
                form.botaoExcluirPlano.disabled = false;
            },
            error: function (data) {
                $('#retornoValidacaoPlano2').html(data.toString());
            }
        })
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
        if (confirm("Excluir o Cadastro do Plano ?")) {
            $.ajax({
                type: 'POST',
                url: '/excluirPlano',
                data: {
                    idPlano: form.idPlano.value
                },
                success: function (data) {
                    $('#retornoValidacaoPlano2').html(data.toString());
                },
                error: function (data) {
                    $('#retornoValidacaoPlano2').html(data.toString());
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
            url: '/alterarPlano',
            data: {
                idPlano: form.idPlano.value,
                tipo: form.tipo.value,
                descricao: form.descricao.value, 
                duracao: form.duracao.value,  
                preco: form.preco.value,
                convenio: form.convenio.value,
                imagemPlano: form.imagemPlano.value
            },
            success: function (data) {
                alert(data);
            },
            error: function (data) {
                alert(data);
            }
        });
    });
});
