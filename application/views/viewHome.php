<!DOCTYPE html>
<html>
<head>
	<title>Push Cerveja 1.0 | LDS Ulbra Torres</title>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="msapplication-tap-highlight" content="no">
    <link rel="icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>" type="image/gif">
	<link rel="stylesheet" type="text/css" href="assets/css/materialize.css">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.2.js"></script>
	<script type="text/javascript" src="assets/js/materialize.js"></script>

	<style type="text/css">
		body {
			background: url(assets/img/teste.jpg) no-repeat center top fixed;
			
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
		
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
		    $("#zera").click(function(){    
                $("#cevas").val("0");
        });

        function reload(){
        	$.ajax({
				url: "<?php echo site_url('/CervejaController'); ?>",
				type: "POST",
				data: $("table"),
				success: function(data){
					$("#Tpeople").html($(data).find("#Tpeople"));
				},
				error: function(){
					console.log(data);
					Materialize.toast('Erro ao recarregar a tabela, atualize a pagina!', 4000);	
				}
			});
		}
		var idNego;
		$("body").on("click", ".add_ceva", function(e){
			e.preventDefault();
			idNego = $(this).attr("id");
			$.ajax({
				url: "<?php echo site_url('/CervejaController/getUniqueUser'); ?>",
				type: "POST",
				data: {
					fella: idNego
				},
				success: function(data){
						var obj = JSON.parse(data);
							$('#print').html("");
							var items=[]; 	
							$.each(obj, function(i,val){											
								items.push($("<div class='blue-text col s12 m6'><label>Pagador</label><h4>" + val.nome + "</h4></div><div class='col s12 m2'><label for='cevas'>Cevas</label><input id='cevas' type='number' value='"+val.quantidade+"'></div>"));
							});	
							$('#print').append.apply($('#print'), items);	
				},
				error: function(data){
					console.log(data);
					Materialize.toast("Pauzera", 4000);
				}
			});
			$("#modal1").openModal();
		});
        $("body").on("click", "#go", function(e){
        	e.preventDefault();
        	$.ajax({
        		url: "<?php echo site_url('/CervejaController/changeCevas'); ?>",
        		type: "POST",
        		data: {
					id: $("#cevas").val(),
					cevas: idNego
				},
        		success: function(data){
        			if(data == "1"){
						reload();
        				Materialize.toast("Alterado!", 4000, 'rounded');
        			}else{
        				reload();
        				Materialize.toast("Deu Erro!", 4000);
        			}
        		},
        		error: function(data){
        			console.log(data);
        			Materialize.toast("Pauzera", 4000);
        		}
        	});
        });
    });
</script>
</head>
<body>
<a class="blue-text"  href="<?= base_url('login/logout'); ?>">SAIR</a>
	<div class="container">
		<div class="row">
			<div class="center card-panel col s12">
				<h3>Push Cervejas 1.0 | LDS Ulbra Torres</h3>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col s12 card-panel collection z-depth-4">
				<table id="Tpeople" class="bordered highlight">  
					<thead>
						<td><strong>Nome </strong></td>
						<td><strong>Quantidade</strong></td>
						<td></td>
					</thead>
					<tbody>
						<?php foreach ($cerveja as $fila) :?>
							<tr>
								<td><i class="blue-text material-icons prefix">account_circle</i><?= $fila['nome'] ?>
								</td>
								<td>
									<?php 
				                    if($fila['quantidade'] > 0){
					                    echo "<i data-position='right' data-delay='50' data-tooltip='Ta Devendo Cavalo!' class='tooltipped red-text material-icons prefix'>shopping_cart</i><span>".$fila['quantidade']."</span>";
				                    }else{
					                    echo "<i class='green-text material-icons prefix'>shopping_cart</i><span style='color:green'>".$fila['quantidade']."</span>";
				                    }
				                    ?>
				                </td>
				                <td>
									<a class="add_ceva tooltipped" id="<?= $fila['id']; ?>" data-position="left" data-delay="50" data-tooltip="Adicionar/Remover" href="#"><i class="material-icons pink-text">add_shopping_cart</i></a>
								    </a>
							    </td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div id="modal1" class="modal bottom-sheet">
	<div class="modal-content">
		<div class="row">
			<div class="container">
                <div id="print">

                
                </div>
                 <a style="margin-top: 20px;" class="btn tooltipped red" id="zera" data-position="right" data-delay="50" data-tooltip="Zerar"><i class="large material-icons">highlight_off</i></a>
			</div>
		</div>
	</hr>
		<div class="modal-footer">
			<a href="#!" id="go" class="tooltipped modal-action modal-close waves-effect green white-text btn-flat" data-position="top" data-delay="50" data-tooltip="Enviar"><i class="large material-icons">send</i></a>
		</div>
	</div>
</div>
</body>
</html>