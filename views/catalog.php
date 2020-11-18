<? /**
 * @var \app\model\Products $product
 */

?>

<? foreach ($products as $product): ?>

    <b><a href="/product/card/?idx=<?=$product['idx']?>"><?=$product['name']?></a></b>
    <p><?=$product['description']?></p>
    <p>Стоимость: <?=$product['price']?></p>
    <input hidden type="text" name="idx" value="<?=$product['idx']?>">
    <button class="action" data-idx="<?=$product['idx']?>"> Купить (ajax) </button>

    <hr>
<? endforeach; ?>