<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>reserva horario</title>
	<link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
	<header>
		<?php include 'inc/cabecalho.inc.php' ?>

		<p><a href="index.php" class="voltar">Home</a> </p>
	</header>
	<main>

	
		<?php
		require_once 'class/rb.php';
		include 'inc/conexaoBD.inc.php';


		for($i = 8; $i <= 18; $i++){
				echo "<a href=\"processahoras.php\">$i</a>";
				echo "<br>";
		}
		?>
		<footer>
			<?php include 'inc/rodape.inc.php' ?>
		</footer>
</body>
</html>
