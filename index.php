
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF8">
 <title> Ativação ONU</title>
</head>
<body style="background-color: rgba(254, 254, 254, 0.3);">
 <div class="container" style="padding-top:2em;">

  <div class="panel panel-default">
    <div class="panel-heading">
      <!--<h3 class="panel-title text-center" font-size="5px">Ativação ONU</h3>-->
      <!--<legend style="font-size:20px; padding-top:30px" class="col-md-6 offset-md-3">Preencha os campos abaixo:</legend>-->
      <img class="rounded mx-auto d-block"  style="width:250px;height:250px;">
    </div>

    <div class="panel-body">

      <!--<form action="getform.php" method="POST">-->

        <fieldset>
          <div class="form-group" id="nome">
            <!--<label for="nome" class="col-md-6 offset-md-3 control-label">Cliente</label>-->
            <div class="col-md-6 offset-md-3">
              <input type="text" class="form-control" placeholder="Cliente" id="nome_cliente" name="nome_cliente" required>
              <span class ='msg-erro msg-nome'></span>
            </div>
          </div>

          <div class="form-group">
            <!--<label for="serial_number" class="col-md-6 offset-md-3 control-label">Serial Number</label>-->
            <div class="col-md-6 offset-md-3">
              <input type="text" class="form-control" placeholder="Insira os últimos 4 digítos do serial" id="num_serial" name="num_serial" required>
            </div>
          </div>
          <br>

          <div class="form-group">
            <div class="col-md-6 offset-md-3">
              <select class="form-control" name="onu" id="onu" required oninvalid="this.setCustomValidity('Por favor, selecione uma ONU')" oninput="setCustomValidity('')">
                <option value=""disabled selected>Selecione a ONU</option>
                <option value="Tambau">Tambaú</option>
                <option value="10.127.13.23">Alto do Mateus</option>
              </select>
            </div>
          </div>

        </fieldset>
        <br>
        <div class="col-md-6 offset-md-3 d-flex justify-content-center">
          <button type="button" id="enviar" class="btn btn-success"  data-toogle="modal" data-target="#myModal">
            <span class="glyphicon glyphicon-floppy-disk">ATIVAR ONU</span>
          </button>
        </div>

        <div class="col-md-6 offset-md-3 row d-flex justify-content-center">
          <p class="mt-5 mb-3 text-muted">&copy; 2019-2020 v1.0-beta</p>
        </div>
        <!--</form>-->
        <!--INÍCIO DO  MODAL -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">

             <!-- Modal content-->
             <div class="modal-content">
               <div class="modal-header">
                    <p class="modal-title">Ativação ONU</p>
                 <button type="button" class="close" data-dismiss="modal" id="fechar">&times;</button>

               </div>

               <div class="modal-body">

              </div>

              <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal" id="sair">Sair</button>
             </div>
           </div>
          </div>
        </div>
        <!-- FIM DO MODAL -->

      </div>
    </div>
  </div>

</body>

</html>


<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
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


