<?php

?>
<h1>Корзина</h1>

<? foreach ($products as $product): ?>

    <b><a href="/product/card/?idx=<?=$product['id_prod']?>"><?=$product['name']?></a></b>
    <p><?=$product['description']?></p>
    <p>Стоимость: <?=$product['price']?></p>
    <button class="delete" data-idx="<?=$product['id_basket']?>"> Удалить (ajax) </button>
    <hr>
<? endforeach; ?>
<br>
<a href="/">Каталог</a>