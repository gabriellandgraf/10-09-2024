<?php

include 'db_connect.php';

// Calcular o número de itens no carrinho
$cart_count = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $cart_count += $item['quantidade'];
    }
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Loja Virtual</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="meus_pedidos.php">Meus Pedidos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cart.php">Carrinho <span id="cart-count" class="badge badge-pill badge-primary"><?php echo $cart_count; ?></span></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <li class="nav-item">
                    <span class="navbar-text">Bem-vindo, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">
                        <i class="fas fa-user"></i> Sair
                    </a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cadastrar.php">Cadastrar</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<!--
    1) Qual é a função do arquivo header.php na aplicação e como ele contribui para a experiência do usuário?
    2) Como o header.php gerencia a exibição do número de itens no carrinho de compras e qual a importância dessa funcionalidade?
    3) De que maneira o header.php diferencia a exibição de elementos da navbar para usuários logados e não logados?
    4) Qual a importância da função htmlspecialchars() utilizada no header.php, e quais problemas ela ajuda a evitar?

        resposta:

1) O arquivo header.php no WordPress define o cabeçalho do site, contendo logo, navegação, scripts e metadados. Suas funções principais são:
*Consistência: Aplica o mesmo cabeçalho em todas as páginas.
*Organização: Evita duplicação de código.
*Carregamento: Inclui recursos essenciais (CSS, JavaScript).
*Melhoria da UX: Oferece navegação consistente, design responsivo e otimização para SEO.

2) O header.php exibe o número de itens no carrinho de compras usando funções PHP, como WC()->cart->get_cart_contents_count() no WooCommerce, ou via JavaScript/AJAX para atualizações dinâmicas. Essa funcionalidade é importante para melhorar a experiência do usuário, mantendo-o informado sobre o status de suas compras e incentivando a finalização do pedido.

3) O header.php diferencia a exibição de elementos da navbar para usuários logados e não logados utilizando condições PHP, como is_user_logged_in(). Para usuários logados, exibe opções como "Minha Conta" ou "Logout", enquanto para não logados, mostra "Login" ou "Registrar". Isso personaliza a navegação conforme o estado de autenticação do usuário.

4) A função htmlspecialchars() é importante no header.php porque converte caracteres especiais em entidades HTML, evitando a execução de código malicioso. Isso ajuda a prevenir ataques de XSS (Cross-Site Scripting), protegendo a aplicação de injeção de scripts e garantindo que o conteúdo seja exibido corretamente no navegador sem risco de exploração.

 -->