<!DOCTYPE HTML>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Médicos</title>
	<link rel="stylesheet" href="<?php echo URL;?>model/css/index.css">
</head>

<body>
	<div class="container">
		<h2>Listagem de Médicos</h2>
		<p>Segue abaixo a listagem dos médicos cadastrados:</p>
		<button type="button" onclick="window.location.href = 'index.php?op=new' " class="btn btn-info">Cadastrar Médico</button>

		<table class="table table-hover">
			<thead>
				<tr>
					<th>Nome do Médico</th>
					<th>Endereço do Consultório</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($medicos as $medico) : ?>
					<tr>
						<td><?php echo htmlentities($medico->nome); ?></a></td>
						<td><?php echo htmlentities($medico->endereco_consultorio); ?></td>
						<td>
							<button onclick="window.location.href = 'index.php?op=edit&id=<?php echo $medico->id; ?>';" type="button" class="btn btn-success">Editar</button>
							<button onclick="window.location.href = 'index.php?op=delete&id=<?php echo $medico->id; ?>';" type="button" class="btn btn-danger">Excluir</button>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</body>

</html>