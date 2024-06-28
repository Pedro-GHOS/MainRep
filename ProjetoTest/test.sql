<?php

$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}


$username = $_POST['username'];
$senha = $_POST['senha'];


$sql = "SELECT id, username FROM usuarios WHERE username = ? AND senha = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $senha);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows == 1) {
    // Usuário autenticado com sucesso
    session_start();
    $_SESSION['username'] = $username; // Salva o username na sessão
    
    // Página principal 
    header("Location: pagina_protegida.php");
    exit();
} else {
    // Usuário não autenticado
    echo "Usuário ou senha incorretos.";
}

// Fecha a conexão com o banco de dados
$stmt->close();
$conn->close();
?>
