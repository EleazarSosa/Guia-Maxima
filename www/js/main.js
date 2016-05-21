$(document).ready(function(){

    $("#main").bind("panelbeforeload", startApp);
        // setup signin and signup button events

    //Iniciar Sesion
    $("#formIniciar").submit(function(e){

    });

    //Registrar Usuario
    $('#formRegistrar').submit(function(e) {
        e.preventDefault();

        var data = $(this).serializeArray();
        data.push({name: 'tag', value: 'registrar'});
        $.ajax({
            url: "http://linkd.mx/desarrollo/GuiaMaxima/registrar.php",
            type: "post",
            dataType: "json",
            data: data
        })
        .done(function() {  //true
            $.afui.loadContent("#seleccion", null, null, "fade");
        })
        .fail(function() {  //false
            var opts={
                    message:"Este correo ya existe",
                    position:"tc",
                    delay:2000,
                    autoClose:true,
                    type:"error"
                };
                $.afui.toast(opts);
        })
        .always(function() { //Siempre
            $("#nombre").val("");
            $("#correo").val("");
            $("#password").val("");
        });           
    });

    //Recuperar Password
    $("#recuperarpass").on("click", function(){
        recuperarPassword();
    });

    //Consultar Helados
    $("#consultaHelado").on("click", function(){
        $.getJSON('http://linkd.mx/desarrollo/GuiaMaxima/consultaHelado.php',
            function(data){
                console.log(JSON.stringify(data));
                var datos;
                var tr;
                for(var i = 0; i< data.length; i++){
                    tr = $('<tr/>');
                        tr.append("<td>" + data[i].idhelado + "</td>");
                        tr.append("<td>" + data[i].sabor + "</td>");
                    $('#tabla').append(tr);
                }
                $.afui.loadContent("#sabores", null, null, "fade");
            });
    });

});

    function startApp(){
        // clears all back button history
        $.afui.clearHistory();
        // your app code here
    }