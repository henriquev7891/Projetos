<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Estruturas de Dados</title>
    <!-- Icon / Favcon -->
    <link rel="icon" type="imagem/png" href="../img/php.png" />
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body style="background-color: azure;">
<header>
    <div>
    <img src="../img/banner.jpg" class="img-fluid">
    </div>
</header>
<!-- Navbar -->
<div>
    <div class="d-flex flex-column flex-md-row align-items-center p-4 px-md-4 mb-3 bg-dark text-white shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">Estrutura de Dados</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-white nav-item" style="text-decoration: none;" href="../index.html">Home</a>
            <a class="p-2 text-white nav-item" style="text-decoration: none;" href="../conteudos.html">Cont??udos Vistos</a>
        </nav>
    </div>
</div>
<!-- Fim Navbar -->
<br>
<h1 class="text-center">Verificando hor??rio - Estrutura de Controle IF (SE)</h1>
<br>
<!-- Caixa de Texto -->
<div class="card text-center">
    <div class="card-header">
        <br>
    </div>
    <div class="card-body text-start" style="font-family: 'Segoe UI';">
        <p class="text-start" style="font-size: 20px;">
            <?php


            date_default_timezone_set('America/Sao_Paulo');

            $hora = date("H");

            if ($hora < "12") {
                echo "<b style='color: green;'>Bom dia!</b>"; // verde
            }
            elseif ($hora <= "18") {
                echo "<b style='color: red;'>Boa tarde!</b>"; // vermelha
            }
            elseif ($hora > "18") {
                echo "<b style='color: blue;'>Boa Noite!</b>"; // azul
            }


            ?>
        </p>
    </div>
    <div class="card-footer text-muted">
        <br>
    </div>
</div>
<!-- Fim Caixa de Texto -->
</body>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<!-- Footer -->
<footer id="sticky-footer" class="py-4 bg-dark text-white-50">
    <div class="container text-center">
        <small>Copyright &copy; Henrique R. V.</small>
        <div class="float-right">
            <p class="fab fa-twitter-square" style="font-size: 25px; color: cornflowerblue;"></p>
            <p class="fab fa-facebook-square" style="font-size: 25px; color: cornflowerblue; margin-left: 15px;"></p>
        </div>
    </div>
</footer>
<!-- Fim Footer -->
</html>