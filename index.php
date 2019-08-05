eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<script>


function refresh() {
  window.location.reload(true);
  // window.location.reload(); use this if you do not remove cache
}

/*function enviardados(dados){
if (document.dados.nome_cliente.value=="" ||
        document.dados.nome_cliente.value.length < 3)
    {
        alert( "Preencha campo Cliente corretamente!" );
        document.dados.nome_cliente.focus();
        return false;
    }
if (document.dados.num_serial.value=="" ||
        document.dados.num_serial.value.length < 4)
    {
        alert( "Preencha campo Serial Number corretamente!" );
        document.dados.num_serial.focus();
        return false;
    }
        alert("Enviado");

}

*/





/********* CHAMA O BOTÃO E O AJAX     **********/
window.onload = function() {



    $("#enviar").click(function(e){
            e.preventDefault();     //,

            var nome = document.getElementById('nome_cliente');

            var serial = document.getElementById('num_serial');
            var onu = document.getElementById('onu');

            if(nome == ''){
                console.info(nome);

            }else if(serial == ''){
                alert('Preencha o campo');

            }else if(onu =='' ){
                //alert('Selecione');
            }else{

var enviar = $('#enviar').serialize();  //serialize: transforma os dados em uma string antes de enviar

          $.ajax({

                type: 'POST',
                url : 'getform.php',
                dataType : 'json',
                data : {

                        'nome_cliente': $('#nome_cliente').val(),  //variavel = valor;
                        'num_serial': $('#num_serial').val(),
                        'onu': $('#onu option:selected').val()
                    },


                async : false,
                error: function(resposta) {
                    $('.modal-body').html(JSON.stringify(resposta)); // converte para string o JSON
                    $('#myModal').modal('show');

                },
            success : function(resposta) {

                    //$('#myModal').modal('show');
                        //if( typeof resposta.erro == 'undefined' ) {
                    //console.info(resposta);
                    if(resposta){
                        $('.modal-body').html(JSON.stringify(resposta));
                        $('#myModal').modal('show');


                        $("#sair").click(function(){
                            setInterval(function() {
                                refresh()
                            }, 1500);
                        });

                        $("#fechar").click(function(){
                            setInterval(function(){
                                refresh()
                            },1500);

                        });


                    //alert("sucesso");
                    }else{
                        //$('#myModal').modal('show');
                       //alert('Ocorreu algum erro');

                       }

            }

                });
            }
            });







}



</script>
