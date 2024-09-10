<?php
$servername = "localhost";
$username = "root"; // seu usuário
$password = ""; // sua senha
$dbname = "loja_virtual"; // nome do banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>


<!--
    1) Explique o propósito do arquivo db_connect.php na aplicação e como ele facilita a manutenção do código.
    2) Quais são as implicações de utilizar die() para tratar erros de conexão no db_connect.php?
    3) Quais são os riscos de definir as credenciais do banco de dados diretamente no código, como feito no db_connect.php?
    4) Descreva uma alternativa para melhorar a forma como o db_connect.php verifica a conexão e lida com possíveis erros.

    resposta:

1) O arquivo db_connect.php é usado para centralizar a lógica de conexão ao banco de dados, armazenando as credenciais e o código de conexão em um único lugar. Isso facilita a manutenção, pois qualquer alteração nas configurações do banco precisa ser feita apenas nesse arquivo, além de permitir a reutilização do código em várias partes da aplicação.

2) Utilizar die() para tratar erros de conexão no db_connect.php interrompe a execução do script ao ocorrer uma falha, mas tem implicações negativas, como exibir mensagens genéricas, potencial exposição de dados sensíveis e a falta de tratamento adequado de erros, como logs ou redirecionamentos para páginas de erro personalizadas.

3) Definir credenciais do banco de dados diretamente no código, como no db_connect.php, expõe a aplicação a riscos de segurança, como:
*Vulnerabilidade a Ataques: Credenciais podem ser acessadas por invasores se o código for comprometido.
*Dificuldade na Manutenção: Alterações nas credenciais exigem mudanças no código-fonte.
*Exposição acidental: Se o código for exposto publicamente, as credenciais podem ser reveladas.

4) Uma alternativa para melhorar a verificação e o tratamento de erros no db_connect.php é usar exceções e um sistema de log. Por exemplo:
*Uso de Exceções: Envolva a conexão em um bloco try-catch para capturar e tratar exceções de conexão.
*Sistema de Log: Registre erros em um arquivo de log em vez de usar die(), permitindo uma análise posterior sem expor informações ao usuário final.
Isso proporciona um tratamento de erros mais robusto e seguro.
 -->