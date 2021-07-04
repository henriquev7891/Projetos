<?php

if(isset($_POST["id"]) && !empty($_POST["id"])){
   
    require_once "configuracao_mysql.php";
    
    
    $sql = "DELETE FROM funcionarios WHERE id = :id";
    
    if($stmt = $pdo->prepare($sql)){ // Fazendo a verificacao e conexao com o banco (PDO) 
        
        $stmt->bindParam(":id", $param_id); // Tranformando a variável ID em parametro para manipular
        
       
        $param_id = trim($_POST["id"]); // Funcao trim tira os espacos em braco e depois da verificacao anterior guarda o id no caso / faz o GET do id no banco
        
       
        if($stmt->execute()){ // Depois das verificacoes executa o index.php ( Depois de feito o DELETE ele retorna para HOME )
            
            header("location: index.php");
            exit();
        } else{
            echo "Algo deu errado";
        }
    }
     

    unset($stmt); // Destrói as variáveis ​​especificadas anteriores (stmt), para não ter erros em uma nova operacao, a anterior é destruida ( Parecido com o que fazemos em Arquivos com a variável explode )
    
   
    unset($pdo); // Destrói as variáveis ​​especificadas anteriores (pdo)
} else{
  
    if(empty(trim($_GET["id"]))){
       
        header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Deletar Funcionário</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Deletar Funcionário</h1>
                    </div>
					<!-- Juntando as operacoes do PHP no Formulário e junto com as variáveis de conexão do Server ($_SERVER['REQUEST_URI']) fazendo a conexao.  -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Tem certeza que quer deletar esse funcionário ?</p><br>
                            <p>
                                <input type="submit" value="Sim" class="btn btn-danger">
                                <a href="index.php" class="btn btn-default">Não</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>