<?php

use app\models\Products;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $products app\models\Products */
/* @var $total */
/* @var $form ActiveForm */
?>

<div id="cart">
	<?php $form = ActiveForm::begin([
							'fieldConfig' => [
								'labelOptions' => [
									'class' => 'input-label'
							]]]); ?>
		<div class="box">
			<div class="center">
				<div class="list">
					<h3>Cart</h3>
					<? if(!$products){ ?>
						Cart is empty.
					<? }else{ ?>
						<div class="products">
							<? foreach($products as $cart){ ?>
								<? $product = Products::findOne($cart->id_product);?>
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
										<div class="quantity">
											<button class="qbutton minus-button <? if($cart->quantity == 1) echo 'disable';?>" id="<?=$cart->id_product?>" type="button">
												<span>−</span>
											</button>
											<div class="quantity_count"><?=$cart->quantity?></div>
											<button class="qbutton plus-button" id="<?=$cart->id_product?>" type="button">
												<span>+</span>
											</button>
										</div>
										<div style="padding-left: 10px;">
											<div><?=$product->getPrice()?> 
												<span><?=$product->getCurrency()?></span>
											</div>
										</div>
									</div>
									<div style="margin-left: 10px;">
										<button class="remove" id="<?=$cart->id_product?>" type="button">
											<svg width="12" height="12" viewBox="0 0 14 14"><path fill="currentColor" fill-rule="evenodd" d="M8.414 7l4.95 4.95-1.414 1.414L7 8.414l-4.95 4.95L.636 11.95 5.586 7 .636 2.05 2.05.636 7 5.586l4.95-4.95 1.414 1.414L8.414 7z"></path></svg>
										</button>
									</div>
								</div>
							<? } ?>
						</div>
						<div class="total">
							<div class="total-block">Total:
								<div class="price"><?=$total?><span><?=$product->getCurrency()?></span></div>
							</div>
						</div>
					<? } ?>
				</div>
				<div class="list">
					<fieldset class="text-fields-box">
						<legend class="fields-title">Contact information</legend>
						<div class="fields-row">
							<div class="field-out">
								<?= $form->field($order, 'name')->textInput(['maxlength' => 40, 'class' => 'input-field']) ?>
							</div>
							<div class="field-out">
								<?= $form->field($order, 'phone')->textInput(['maxlength' => 15, 'class' => 'input-field']) ?>
							</div>
						</div>
						<div class="fields-row">
							<div class="field-out">
								<?= $form->field($order, 'email')->textInput(['maxlength' => 40, 'class' => 'input-field']) ?>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="list">
					<fieldset class="text-fields-box">
						<legend class="fields-title">Delivery</legend>
						<div class="fields-row">
							<div class="field-out2">
								<?= $form->field($order, 'address')->textInput(['maxlength' => 400, 'class' => 'input-field2']) ?>
							</div>
						</div>
						<div class="fields-row">
							<div class="field-out">
								<?= $form->field($order, 'flat')->textInput(['maxlength' => 40, 'class' => 'input-field']) ?>
							</div>
							<div class="field-out">
								<?= $form->field($order, 'floor')->textInput(['maxlength' => 40, 'class' => 'input-field']) ?>
							</div>
						</div>
					</fieldset>
					<div class="form-group">
						<center>
							<?= Html::submitButton('Order', ['class' => 'order-button']) ?>
						<center>
					</div>
				</div>
			</div>
		</div>
    <?php ActiveForm::end(); ?>
</div>