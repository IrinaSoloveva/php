<? /**
 * @var \app\model\Products $product
 */
?>


<h1><?=$product->name?></h1>
<p><?=$product->description?></p>
<p>Стоимость: <?=$product->price?></p>
    <input hidden type="text" name="idx" value="<?=$product->idx?>">
<button class="action" data-idx="<?=$product->idx?>"> Купить (ajax) </button>
<br>
<br>
<a href="/">Каталог</a>