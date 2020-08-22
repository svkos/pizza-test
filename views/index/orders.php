<?php
/* @var $this yii\web\View */
/* @var $products app\models\Products */
?>

<div id="cart">
	<div class="box">
		<div class="center">
			<div class="list">
				<fieldset>
					<legend class="fields-title">My orders</legend>
					<div class="fields-row">
						<div class="field-out">
							<div class="form-group field-orders-phone">
								<label class="input-label" for="orders-phone">Phone</label>
								<input type="text" id="orders-phone" class="input-field" name="phone" maxlength="15">
							</div>
						</div>
						<button type="button" class="order-button check-button">
							<span>Check</span>
						</button>
					</div>
				</fieldset>
			</div>
			<div id="orders"></div>
		</div>
	</div>
</div>
