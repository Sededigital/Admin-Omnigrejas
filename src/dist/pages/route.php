<?php
$pagina = $_GET['pagina'] ?? 'home';

$pagina_atual = match ($pagina) {
    'home'          => 'home.php',
    'aliancas'     => 'aliancas.php',
    'ativar-publicidade' => 'ativar-publicidade.php',
    'configuracoes' => 'configuracoes.php',
    'gestao-compras' => 'gestao-compras.php',
    'gestao-valores' => 'gestao-valores.php',
    'categorias'     => 'categorias.php',
    'gestao-usuarios' => 'gestao-usuarios.php',
    'relatorio_cultural' => 'relatorio_cultural.php',
    'servico-produto' => 'servico-produto.php',
    'publicacoes-igrejas' => 'publicacoes-igrejas.php',
    'publicacoes' => 'publicacoes.php', 
    'igrejas'       => 'igrejas.php',
    'planos'        => 'planos.php',
    'departamentos' => 'departamentos.php',
    'institucional' => 'institucional.php',
    'departamento'  => 'departamento.php',
    'menu-preco'   => 'menu-preco.php',
    'obreiros'       => 'obreiros.php',
    'categoria'     => 'categoria.php',
    'usuarios'      => 'meus_usuarios.php',
    'agendamentos' => 'agendamentos.php',
    default         => '404.php', 
};
?>
