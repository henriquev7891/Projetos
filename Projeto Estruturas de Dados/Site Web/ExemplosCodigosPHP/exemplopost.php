<?php


$n1 = $_POST['n1']; // É usado a variável $n1 junto com o método POST para receber o primeiro valor/dados do formulário.
$n2 = $_POST['n2']; // É usado a variável $n2 junto com o método POST para receber o segundo valor/dados do formulário.

$soma = $n1 + $n2; // É criado a váriavel $soma para utilizar o operador de soma " + " para somar o primeiro valor recebido do formulário com o segundo valor

echo "O resultado da soma é: $soma "; // Aqui o echo utiliza a váriavel $soma para pegar o valor somado anteriormente e imprimir a mensagem com o resultado.





?>
