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
	
</head>
<body>
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
									<i class="material-icons pink-text">add_shopping_cart</i>
								    </a>
							    </td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>