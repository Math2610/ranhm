<?php
// Conexão ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "harrypotter_site";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Processar formulário de comentários
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nickname = $_POST['nickname'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO comments (nickname, comment) VALUES ('$nickname', '$comment')";
    if (!$conn->query($sql)) {
        echo "Erro: " . $conn->error;
    }
}

// Carregar comentários
$sql = "SELECT nickname, comment, created_at FROM comments ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='comment'><strong>{$row['nickname']}</strong>: {$row['comment']} <br><small>em {$row['created_at']}</small></div>";
    }
} else {
    echo "<p>Sem comentários ainda. Seja o primeiro!</p>";
}

$conn->close();
?>
