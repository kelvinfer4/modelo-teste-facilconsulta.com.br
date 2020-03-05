<!DOCTYPE HTML>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<title>
		<?php echo htmlentities($title); ?>
	</title>
</head>

<body>
	<?php
	if ($errors) {
		echo '<ul class="errors">';
		foreach ($errors as $field => $error) {
			echo '<li>' . htmlentities($error) . '</li>';
		}
		echo '</ul>';
	}
	?>

	<div class="container form-content">
		<div class="card main-form" id="login-form">
			<div class="card-header">
				<h3> Editar Cadastro de Médico </h3>
			</div>
			<div class="card-body">
				<form class="form row" role="form" autocomplete="off" id="formLogin" method="post" action="">
					<div class="form-group col-md-6">
						<label for="nome">Nome do Médico:</label>
						<input type="text" class="form-control" name="nome" minlength="6" maxlength="112" value="<?php echo htmlentities($medico->nome); ?>" required>
					</div>
					<div class="form-group col-md-6">
						<label for="endereco_consultorio">Endereço do Consultório </label>
						<input type="text" class="form-control" id="endereco_consultorio" name="endereco_consultorio" minlength="6" maxlength="112" value="<?php echo htmlentities($medico->endereco_consultorio); ?>" required>
					</div>
					<div class="form-group col-md-6">
						<label for="name"> Senha: </label>
						<input type="password" class="form-control" name="senha" minlength="6" maxlength="112">
					</div>
					<div class="col-md-6"></div>

					<input type="hidden" name="form-submitted" value="1">
					<input type="submit" value="Editar Cadastro" class="btn btn-success btn-lg col-md-6">
					<button type="button" onclick="location.href='index.php'" class="btn btn-light btn-lg col-md-6">Cancelar</button>
				</form>
			</div>
		</div>
	</div>
</body>

</html>