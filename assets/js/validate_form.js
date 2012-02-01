$( function() {
    //VALIDACAO DO FORMULARIO DE LOGIN
    $("#form_login").validate({
        rules: {
            login: {required:true,minlength:3,maxlength:100},
            senha: {required:true,minlength:3,maxlength:100}
        },
        messages: {
            login: {
                required: "Campo Login &eacute; requerido",
                minlength: "Minimo de 3 caracteres",
                maxlength: "Maximo de 100 caracteres"
            },
            senha: {
                required: "Campo Senha &eacute; requerido",
                minlength: "Minimo de 3 caracteres",
                maxlength: "Maximo de 100 caracteres"
            }
        }
    });
    
    
    //VALIDACAO DO FORMULARIO DE ESQUECI A SENHA
    $("#form_esqsenha").validate({
        rules: {
            email: {required:true,minlength:3,maxlength:255,email:true}
        },
        messages: {
            email: {
                required: "Campo E-mail &eacute; requerido",
                minlength: "Minimo de 3 caracteres",
                maxlength: "Maximo de 255 caracteres",
                email: "O campo deve conter um e-mail valido"
            }
        }
    });
    
    
    //VALIDACAO DO FORMULARIO DE CADASTRAR NOVO USUARIO
    $("#form_cadastrar").validate({
        rules: {
            nome: {required:true,minlength:1,maxlength:255},
            login: {required:true,minlength:3,maxlength:100},
            email: {required:true,minlength:3,maxlength:100,email:true},
            senha: {required:true,minlength:3,maxlength:255},
            conf_senha: {equalTo: "#senha"}
        },
        messages: {
            nome: {
                required: "Campo Nome &eacute; requerido",
                minlength: "Minimo de 1 caracteres",
                maxlength: "Maximo de 255 caracteres"
            },
            login: {
                required: "Campo Login &eacute; requerido",
                minlength: "Minimo de 3 caracteres",
                maxlength: "Maximo de 100 caracteres"
            },
            email: {
                required: "Campo E-mail &eacute; requerido",
                minlength: "Minimo de 3 caracteres",
                maxlength: "Maximo de 100 caracteres",
                email: "O campo deve conter um e-mail valido"
            },
            senha: {
                required: "Campo Senha &eacute; requerido",
                minlength: "Minimo de 3 caracteres",
                maxlength: "Maximo de 100 caracteres"
            },
            conf_senha: {
                equalTo: "Campo deve ser igual ao campo Senha"
            }
        }
    });
    
    
    //VALIDACAO DO FORMULARIO DE EDICAO DO PERFIL
    $("#form_editar_perfil").validate({
        rules: {
            nome: {required:true,minlength:1,maxlength:255},
            login: {required:true,minlength:3,maxlength:100},
            email: {required:true,minlength:3,maxlength:100,email:true},
            senha: {minlength:3,maxlength:255},
            conf_senha: {equalTo: "#senha"}
        },
        messages: {
            nome: {
                required: "Campo Nome &eacute; requerido",
                minlength: "Minimo de 1 caracteres",
                maxlength: "Maximo de 255 caracteres"
            },
            login: {
                required: "Campo Login &eacute; requerido",
                minlength: "Minimo de 3 caracteres",
                maxlength: "Maximo de 100 caracteres"
            },
            email: {
                required: "Campo E-mail &eacute; requerido",
                minlength: "Minimo de 3 caracteres",
                maxlength: "Maximo de 100 caracteres",
                email: "O campo deve conter um e-mail valido"
            },
            senha: {
                minlength: "Minimo de 3 caracteres",
                maxlength: "Maximo de 100 caracteres"
            },
            conf_senha: {
                equalTo: "Campo deve ser igual ao campo Senha"
            }
        }
    });
    
    //VALIDACAO DO FORMULARIO DE CONTATO
    $("#form_contato").validate({
        rules: {
            nome: {required:true,minlength:1,maxlength:255},
            email: {required:true,minlength:3,maxlength:255,email:true},
            titulo: {required:true,minlength:1,maxlength:255},
            mensagem: {required:true}
            
        },
        messages: {
            nome: {
                required: "Campo Nome &eacute; requerido",
                minlength: "Minimo de 1 caracteres",
                maxlength: "Maximo de 255 caracteres"
            },            
            email: {
                required: "Campo E-mail &eacute; requerido",
                minlength: "Minimo de 3 caracteres",
                maxlength: "Maximo de 255 caracteres",
                email: "O campo deve conter um e-mail valido"
            },
            titulo: {
                required: "Campo E-mail &eacute; requerido",
                minlength: "Minimo de 3 caracteres",
                maxlength: "Maximo de 255 caracteres"
            },
            mensagem: {
                required: "Campo E-mail &eacute; requerido"
            }
        }
    });
    
});
