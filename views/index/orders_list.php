<?php

use yii\helpers\Html;
use app\models\OrdersProducts;

/* @var $this yii\web\View */
/* @var $orders app\models\Orders */
?>

<div class="list">
	<h3>Orders</h3>
	<? if(!$orders){ ?>
		No orders.
	<? }else{ ?>
		<? foreach($orders as $order){ ?>
			Order number <?=$order->id_order?>:
			<div class="products">
				<? foreach($order->ordersProducts as $item){ ?>
					<? $product = $item->products; ?>
					<div class="product">
						<figure class="image">
							<?= Html::img('@web/image/'.$product->image->name, ['height'=>'80']);?>
						</figure>
						<div class="description">
							<h5><?=$product->menu->name?></h5>
							<span><?=$product->parameter->name?>, 
							size <?=$product->size->name?></span>
						</div>
						<div class="quantityprice">
							<?=$item->quantity?>
							<div style="padding-left: 10px;">
								<div><?=$item->price?> 
									<span><?=$order->getCurrencySymbol()?></span>
								</div>
							</div>
						</div>
					</div>
				<? } ?>
			</div>
			<div class="total">
				<div class="total-block">Total: 
					<div class="price"><?=$order->getTotalPrice()?> <span><?=$order->getCurrencySymbol()?></span></div>
				</div>
			</div><br><br>
		<? } ?>
	<? } ?>
</div>