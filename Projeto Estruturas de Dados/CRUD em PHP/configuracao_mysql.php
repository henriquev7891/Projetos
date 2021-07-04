<?php
//Criando conexão com o banco
define('DB_SERVER', 'localhost:3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'estruturascrud');
 
try{ // Com a variável (PDO) ele cria a conexão (query) com o Banco 
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
  
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
} catch(PDOException $e){ // Se der erro na conexao, ele exibira a mensagem de Erro
    die("ERROR: Não foi possível conectar. " . $e->getMessage());
}

?>
