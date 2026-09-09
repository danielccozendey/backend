<?php
 
$carrinho = [
    ["produto" => "Notebook", "preco" => 4000.00],
    ["produto" => "Mouse", "preco" => 150.00],
    ["produto" => "Teclado", "preco" => 300.00]
];
 
// array_map percorre cada item e aplica uma transformação, retornando um array novo
$carrinhoBlackFriday = array_map(function ($item) {
    $item["preco"] = $item["preco"] * 0.80;
    return $item;
}, $carrinho);
 
?>
<html>
<body>
 
<h2>Black Friday</h2>
 
<ul>
<?php foreach ($carrinhoBlackFriday as $item) { ?>
    <li><?php echo $item["produto"]; ?> - R$ <?php echo $item["preco"]; ?></li>
<?php } ?>
</ul>
 
</body>
</html>
 