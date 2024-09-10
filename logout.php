<?php
session_start();
session_unset();
session_destroy();

// Redirecionar para a página inicial ou onde o usuário estava
header('Location: index.php');
exit();
?>


<!--
    1) Explique o processo realizado pelo arquivo processa_create_product.php desde o recebimento dos dados do formulário até a inserção do novo produto no banco de dados.
    2) Explique o processo realizado pelo arquivo processa_create_product.php desde o recebimento dos dados do formulário até a inserção do novo produto no banco de dados.
    3) Como o arquivo processa_edit_product.php trata a atualização de um produto se o usuário não fornecer uma nova foto?
    4) Explique o que o arquivo logout.php faz e como ele afeta a sessão do usuário.

    respostas:

1) O arquivo processa_create_product.php realiza o seguinte processo:
1-Recebimento dos Dados: Coleta os dados do formulário de criação de produto usando $_POST.
2-Validação: Valida e sanitiza os dados para garantir que sejam seguros e corretos.
3-Preparação da Query: Prepara uma consulta SQL para inserir os dados no banco de dados.
4-Execução da Query: Executa a consulta para adicionar o novo produto à tabela correspondente no banco de dados.
5-Redirecionamento ou Mensagem: Após a inserção, redireciona para uma página de confirmação ou exibe uma mensagem de sucesso.

2)  O arquivo `processa_create_product.php` realiza o seguinte processo:
1. **Recebe os Dados**: Coleta dados do formulário com `$_POST`.
2. **Valida e Sanitiza**: Verifica e limpa os dados recebidos.
3. **Prepara e Executa a Query**: Cria e executa uma consulta SQL para inserir o produto no banco de dados.
4. **Redireciona ou Exibe Mensagem**: Redireciona para uma página de sucesso ou mostra uma mensagem de confirmação.

3) O arquivo processa_create_product.php:
1-Coleta dados do formulário com $_POST.
2-Valida e limpa esses dados.
3-Executa uma consulta SQL para inserir o produto no banco de dados.
4-Redireciona para uma página de sucesso ou exibe uma mensagem de confirmação.

4) O arquivo `logout.php` encerra a sessão do usuário usando funções como `session_destroy()` e `wp_logout()` no WordPress. Isso faz com que o usuário seja desconectado e redirecionado para uma página de login ou inicial, removendo todas as informações da sessão ativa.
 -->