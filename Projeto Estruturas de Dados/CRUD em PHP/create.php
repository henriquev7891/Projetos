<?php

require_once "configuracao_mysql.php";
 
$nome = $setor = $salario = "";
$nome_err = $setor_err = $salario_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
	//Validação do nome
    $input_nome = trim($_POST["nome"]);
    if(empty($input_nome)){
        $nome_err = "Nome é um campo obrigatório";
    }
    else{
        $nome = $input_nome;
    }
    
    //Validação do setor
    $input_setor = trim($_POST["setor"]);
    if(empty($input_setor)){
        $setor_err = "Setor é um campo obrigatório";     
    } else{
        $setor = $input_setor;
    }
    
    //Validação do salario
    $input_salario = trim($_POST["salario"]);
    if(empty($input_salario)){
        $salario_err = "Salario é um campo obrigatório";     
    } elseif(!ctype_digit($input_salario)){
        $salario_err = "O salario deve ser positivo";
    } else{
        $salario = $input_salario;
    }
    
    //Fazendo verificacao de erros, validacao dos campos e a operacao INSERT no banco
    if(empty($$nome_err) && empty($setor_err) && empty($salario_err)){
        
        $sql = "INSERT INTO funcionarios (nome, setor, salario) VALUES (:nome, :setor, :salario)";
 
        if($stmt = $pdo->prepare($sql)){ //Variável $stmt retorna o número total de linhas alteradas, excluídas, inseridas ou correspondidas pela última instrução
          
            $stmt->bindParam(":nome", $param_nome); //Variável bindParam junto com stmt passa as variáveis para parametros
            $stmt->bindParam(":setor", $param_setor);
            $stmt->bindParam(":salario", $param_salario);
            
            
            $param_nome = $nome;
            $param_setor = $setor;
            $param_salario = $salario;
            
            
            if($stmt->execute()){ // Depois das verificacoes executa o index.php ( Depois de feito o INSERT ele retorna para HOME )
				
                header("location: index.php");
                exit();
            } else{ // Se a operacao der errado ao inves de retornar para Home ele exibe a mensagem de erro
                echo "Algo deu errado";
            }
        }
         
        unset($stmt);
    }
	
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Funcionário</title>
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
                        <h2>Adicionar Funcionário</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($nome_err)) ? 'has-error' : ''; ?>">
                            <label>Nome</label>
                            <input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>">
                            <span class="help-block"><?php echo $nome_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($setor_err)) ? 'has-error' : ''; ?>">
                            <label>Setor</label>
                            <input name="setor" class="form-control" value="<?php echo $setor; ?>">
                            <span class="help-block"><?php echo $setor_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($salario_err)) ? 'has-error' : ''; ?>">
                            <label>Salário</label>
                            <input type="text" name="salario" class="form-control" value="<?php echo $salario; ?>">
                            <span class="help-block"><?php echo $salario_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Adicionar">
                        <a href="index.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>