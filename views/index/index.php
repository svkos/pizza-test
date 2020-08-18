<? use yii\helpers\Html; ?>
<ul class="items">
	<? foreach($menuAll as $menu){ ?>
		<li class="item">
			<div class="product">
				<div class="about">
					<picture class="image">
						<?= Html::img('@web/image/'.$menu->defaultProduct->image->name, ['alt'=>$menu->name, 'height'=>'230', 'width'=>'292']);?>
					</picture>
					<div class="title">
						<h3><?=$menu->name?></h3>
						<div class="nutrition">
							<div class="icon">
								<svg width="18" height="18" viewBox="0 0 18 18">
									<path d="M9 18A9 9 0 119 0a9 9 0 010 18zm0-1A8 8 0 109 1a8 8 0 000 16zM8 4h2v2H8V4zm0 4h2v6H8V8z" fill="currentColor" fill-rule="nonzero"></path>
								</svg>
							</div>
							<div class="nutrition-description">
								<div class="">
									<span>Nutrition information per 100g</span>
								</div>
								Nutrition
							</div>
						</div>
					</div>
					<div class="description"><?=$menu->description?></div>
				</div>
				<div class="cart">
					<div class="parameters">
						<? if($menu->parameters){ ?>
							<div class="type">
								<? foreach($menu->parameters as $parameter){ ?>
									<div class="<? echo $parameter->id_parameter == $menu->defaultProduct->id_parameter ? 'active' : '';?>"><?=$parameter->name?></div>
								<? } ?>
							</div>
						<? } ?>
						<div class="_2n5maMVyMKs6pwgh3QYrgq">
							<div class="selector_size">
								<!--<div class="selector" style="width: 25%; transform: translateX(0%);"></div>-->
								<? foreach($menu->sizes as $size){ ?>
									<div class="size <? echo $size->id_size == $menu->defaultProduct->id_size ? 'active' : '';?>"><?=$size->name?></div>
								<? } ?>
							</div>
						</div>
					</div>
					<div class="add-to-cart">
						<button type="button" class="cart-button">
							<span>Add to cart</span>
						</button>
						<div class="price">
							<span id="price"><?=$menu->defaultProduct->usd_price?>
							<span class="currency">$</span>
						</div>
					</div>
				</div>
			</div>
		</li>	
	<? } ?>
</ul>