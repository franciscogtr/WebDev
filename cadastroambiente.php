<?php
        //Inicia a sessão caso ainda n tenha sido iniciada

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        //Impede acesso de visitantes ou usuários que não são admins

        if (!isset($_SESSION['nome']) or !isset($_SESSION['admin'])) {
            header('Location:login.php');
        }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Ambiente</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
    <?php
        include 'inc/cabecalho.inc.php'
        ?>  
         <p><a href="index.php" class="voltar">Home</a> </p> 
    </header>
    <main>

    
    <form method="post" enctype="multipart/form-data"> <!-- Alterei para post e enctype -->
    <fieldset>
        <h2 class="form">Cadastrar Ambiente</h2>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
        <br><br>
        <label for="imagem">Foto do ambiente (JPG, PNG, GIF):</label> <!-- Aviso sobre os formatos -->
        <br><br>
        <input class="ambiente" type="file" name="imagem" id="imagem" accept="image/jpeg, image/png, image/gif" required> <!-- Restrição de tipos -->
        <br><br>
        <label for="tipo">Tipo de ambiente:</label>
        <select class="ambiente" name="tipo" id="tipo" required>
            <option value="">Selecionar</option>
            <option value="lab">Laboratório</option>
            <option value="sal">Sala</option>
        </select>
        <br><br>
        <p class="pHeader"><a href="index.php" class="voltar">Voltar</a></p>
        <button type="submit">Cadastrar</button>
    </fieldset>
</form>

    </main>

<?php
// Inicia a sessão caso ainda não tenha sido iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Impede acesso de visitantes ou usuários que não são admins
if (!isset($_SESSION['nome']) or !isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

// Verifica se o formulário foi submetido com os dados necessários
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nome'], $_POST['tipo'], $_FILES['imagem'])) {

    require_once 'class/rb.php';
    include 'inc/conexaoBD.inc.php';

    // Validação do campo de imagem
    $imagem = $_FILES['imagem'];
    $extensaoPermitida = ['image/jpeg', 'image/png', 'image/gif'];
   
   
    if (!in_array($imagem['type'], $extensaoPermitida)) {
        echo '<div class="msg">' . '<p class="msgRed">'  . 'Formato de imagem não permitido. Apenas JPG, PNG e GIF são aceitos.' . '</p>' .  '</div>';
        exit;
    }

    // Verifica se o ambiente já está cadastrado
    $ambiente = R::findOne('ambiente', ' nome = ? ', [$_POST['nome']]);
    
    if ($ambiente) {
        echo '<div class="msg">' .  '<p class="msgRed">'  . 'Ambiente já Cadastrado' . '</p>' . '</div>';
    } 
    
    else {
        // Processamento da imagem
        $diretorioDestino = 'img/ambientes/';
        
        
        if (!is_dir($diretorioDestino)) {
            mkdir($diretorioDestino, 0777, true); // Cria o diretório, se não existir
        }

        // Gerar um nome único para o arquivo de imagem
        
        
        $nomeImagem = uniqid('ambiente_', true) . '.' . pathinfo($imagem['name'], PATHINFO_EXTENSION);
        $caminhoImagem = $diretorioDestino . $nomeImagem;

        // Move a imagem para o diretório final
        if (move_uploaded_file($imagem['tmp_name'], $caminhoImagem)) {
            // Salva os dados no banco
            $ambiente = R::dispense('ambiente');
            $ambiente->nome = $_POST['nome'];
            $ambiente->imagem = $nomeImagem; // Salva o nome da imagem no banco
            $ambiente->tipo = $_POST['tipo'];
            R::store($ambiente);
            echo  '<div class="msg">' . '<p class="msgGreen">'  . 'Ambiente cadastrado com sucesso!' . '</p>' . '</div>';
        } else {
            echo '<div class="msg">' . '<p class="msgRed">'  . 'Erro ao carregar a imagem' . '</p>' . '</div>';
        }

        // Fecha a conexão com o banco de dados
        R::close();
    }
}
?>

<footer>
    <?php
        include 'inc/rodape.inc.php'
        ?>
    </footer>
</body>
</html>
