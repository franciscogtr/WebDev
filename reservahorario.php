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
		$ambiente = $_GET['ambiente'];
		$data = $_GET['data'];
		echo $ambiente;
		?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Horários</title>
</head>
<body>
    <h2>Selecione os Horários para Reserva</h2>
    
	<table>
        <tbody>
            <tr>
                <td><a href="processareserva.php?hora=07:00&ambiente=<?=$ambiente?>">07:00</a></td>
                <td><a href="processareserva.php?hora=08:00&ambiente=<?=$ambiente?>">08:00</a></td>
                <td><a href="processareserva.php?hora=09:00&ambiente=<?=$ambiente?>">09:00</a></td>
            </tr>
            <tr>
                <td><a href="processareserva.php?hora=10:00&ambiente=<?=$ambiente?>">10:00</a></td>
                <td><a href="processareserva.php?hora=11:00&ambiente=<?=$ambiente?>">11:00</a></td>
                <td><a href="processareserva.php?hora=12:00&ambiente=<?=$ambiente?>">12:00</a></td>
            </tr>
            <tr>
                <td><a href="processareserva.php?hora=13:00&ambiente=<?=$ambiente?>">13:00</a></td>
                <td><a href="processareserva.php?hora=14:00&ambiente=<?=$ambiente?>">14:00</a></td>
                <td><a href="processareserva.php?hora=15:00&ambiente=<?=$ambiente?>">15:00</a></td>
            </tr>
            <tr>
                <td><a href="processareserva.php?hora=16:00&ambiente=<?=$ambiente?>">16:00</a></td>
                <td><a href="processareserva.php?hora=17:00&ambiente=<?=$ambiente?>">17:00</a></td>
                <td><a href="processareserva.php?hora=18:00&ambiente=<?=$ambiente?>">18:00</a></td>
            </tr>
        </tbody>
    </table>
</body>
</html>

	</main>
	<footer>
		<?php include 'inc/rodape.inc.php' ?>
	</footer>
</body>

</html>