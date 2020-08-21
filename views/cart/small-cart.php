<?php
/* @var $this yii\web\View */
/* @var $totalPrice, $currency */
?>

<a class="small-cart" href="/cart">
	<div class="small-cart-icon">
		<svg width="40" height="40" viewBox="0 0 32 32">
			<path d="M11.2 23.2c-1.32 0-2.4 1.08-2.4 2.4 0 1.32 1.08 2.4 2.4 2.4 1.32 0 2.4-1.08 2.4-2.4 0-1.32-1.08-2.4-2.4-2.4zM4 4v2.4h2.4l4.32 9.12-1.68 2.88c-.12.36-.24.84-.24 1.2 0 1.32 1.08 2.4 2.4 2.4h14.4v-2.4H11.68c-.12 0-.24-.12-.24-.24v-.12l1.08-2.04h8.88c.96 0 1.68-.48 2.04-1.2l4.32-7.8c.24-.24.24-.36.24-.6 0-.72-.48-1.2-1.2-1.2H9.04L7.96 4H4zm19.2 19.2c-1.32 0-2.4 1.08-2.4 2.4 0 1.32 1.08 2.4 2.4 2.4 1.32 0 2.4-1.08 2.4-2.4 0-1.32-1.08-2.4-2.4-2.4z" fill="currentColor" fill-rule="nonzero"></path>
		</svg>
	</div>
	<div class="small-cart-price"><?=$totalPrice?> 
		<span><?=$currency?></span>
	</div>
</a>