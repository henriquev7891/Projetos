<?php

require_once "configuracao_mysql.php"; // import do arquivo de conexao do banco
 
$nome = $setor = $salario = ""; // Definindo as variáveis principais
$nome_err = $setor_err = $salario_err = ""; // Definindo as variáveis de erro
 
if(isset($_POST["id"]) && !empty($_POST["id"])){ // Determinando se a variável é null ou diferente
   
    $id = $_POST["id"];
  
    //Fazendo a Validação do campo nome (SE ESTIVER EM BRANCO/NULL)
    $input_nome = trim($_POST["nome"]);
    if(empty($input_nome)){
        $nome_err = "Nome é um campo obrigatório"; 
    } else{
        $nome = $input_nome;
    }
     //Fazendo a Validação do campo setor (SE ESTIVER EM BRANCO/NULL)
    $input_setor = trim($_POST["setor"]);
    if(empty($input_setor)){
        $setor_err = "Setor é um campo obrigatório.";     
    } else{
        $setor = $input_setor;
    }
    //Fazendo a Validação do campo salário (SE ESTIVER EM BRANCO/NULL)
    $input_salario = trim($_POST["salario"]);
    if(empty($input_salario)){
        $salario_err = "Salario é um campo obrigatório";     
    } elseif(!ctype_digit($input_salario)){
        $salario_err = "O salario deve ser positivo.";
    } else{
        $salario = $input_salario;
    }
    //Fazendo verificacao de erros, validacao dos campos e a operacao UPDATE no banco
    if(empty($nome_err) && empty($address_err) && empty($salary_err)){
        
        $sql = "UPDATE funcionarios SET nome=:nome, setor=:setor, salario=:salario WHERE id=:id";
		
		//Variável $stmt retorna o número total de linhas alteradas, excluídas, inseridas ou correspondidas pela última instrução
        if($stmt = $pdo->prepare($sql)){
           
            $stmt->bindParam(":nome", $param_nome); //Variável bindParam junto com stmt passa as variáveis para parametros
            $stmt->bindParam(":setor", $param_setor);
            $stmt->bindParam(":salario", $param_salario);
            $stmt->bindParam(":id", $param_id);
            
          
            $param_nome = $nome;
            $param_setor = $setor;
            $param_salario = $salario;
            $param_id = $id;
            
            
            if($stmt->execute()){ // Depois das verificacoes executa o index.php ( Depois de feito o UPDATE ele retorna para HOME )
                
                header("location: index.php");
                exit();
            } else{ // Se a operacao der errado ao inves de retornar para Home ele exibe a mensagem de erro
                echo "Algo deu Errado";
            }
        }
         
        unset($stmt); // Destrói as variáveis ​​especificadas anteriores (stmt), para não ter erros em uma nova operacao, a anterior é destruida ( Parecido com o que fazemos em Arquivos com a variável explode )
    }
    

    unset($pdo); // Destrói as variáveis ​​especificadas anteriores (pdo)
} else{
   
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){ // Determinando se a variável é null ou diferente
        
        $id =  trim($_GET["id"]); // Funcao trim tira os espacos em braco e depois da verificacao anterior guarda o id no caso / faz o GET do id no banco
        
        
        $sql = "SELECT * FROM funcionarios WHERE id = :id";  // Select no banco a partir do ID
        if($stmt = $pdo->prepare($sql)){ // Fazendo a verificacao e conexao com o banco (PDO) 
            
            $stmt->bindParam(":id", $param_id); // Tranformando a variável ID em parametro para manipular
            
          
            $param_id = $id; // Guardando
            
            
            if($stmt->execute()){ // Executando/Verificando as linhas afetadas pela instrucao SQL (rowCount)
                if($stmt->rowCount() == 1){
                    
                    $row = $stmt->fetch(PDO::FETCH_ASSOC); // Buscando as linhas/dentro da tabela no banco
                
                    $nome = $row["nome"];
                    $setor = $row["setor"];
                    $salario = $row["salario"];
                } else{
                   
                    echo "Erro"; // Se der errado exibirá a mensagem de Erro
                    exit();
                }
                
            } else{
                echo "Algo deu Errado";
            }
        }
        
        unset($stmt); // Destrói as variáveis ​​especificadas anteriores (stmt), para não ter erros em uma nova operacao, a anterior é destruida ( Parecido com o que fazemos em Arquivos com a variável explode )
        
        unset($pdo); // Destrói as variáveis ​​especificadas anteriores (pdo)
    }  else{
         echo "Erro";
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Funcionário</title>
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
                        <h2>Update Funcionário</h2>
                    </div>
						    <!-- Juntando as operacoes do PHP no Formulário, fazendo a validacao do campo, e junto com as variáveis de conexão do Server ($_SERVER['REQUEST_URI']) fazendo a conexao.  -->
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($nome_err)) ? 'has-error' : ''; ?>">
                            <label>Nome</label>
                            <input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>">
                            <span class="help-block"><?php echo $nome_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($setor_err)) ? 'has-error' : ''; ?>">
                            <label>Setor</label>
                            <textarea name="setor" class="form-control"><?php echo $setor; ?></textarea>
                            <span class="help-block"><?php echo $setor_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($salario_err)) ? 'has-error' : ''; ?>">
                            <label>Salário</label>
                            <input type="text" name="salario" class="form-control" value="<?php echo $salario; ?>">
                            <span class="help-block"><?php echo $salario_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Atualizar">
                        <a href="index.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

