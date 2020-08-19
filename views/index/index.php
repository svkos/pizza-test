<? use yii\helpers\Html; ?>
<ul class="items">
	<? foreach($menuAll as $menu){ ?>
		<li class="item">
			<form class="product">
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
									<? $checked = $parameter->id_parameter == $menu->defaultProduct->id_parameter ? 'checked' : '';?>
									<input type="radio" class="input" name="id_parameter" id="param<?=$menu->id_menu?><?=$parameter->id_parameter?>" value="<?=$parameter->id_parameter?>" <?=$checked?>>
									<label for="param<?=$menu->id_menu?><?=$parameter->id_parameter?>">
										<span><?=$parameter->name?></span>
									</label>
								<? } ?>
							</div>
						<? } ?>
						<div class="selector_size">
							<? foreach($menu->sizes as $size){ ?>
								<? $checked = $size->id_size == $menu->defaultProduct->id_size ? 'checked' : '';?>
								<input type="radio" class="input" name="id_size" id="sizes<?=$menu->id_menu?><?=$size->id_size?>" value="<?=$size->id_size?>" <?=$checked?>>
								<label class="size" for="sizes<?=$menu->id_menu?><?=$size->id_size?>">
									<span><?=$size->name?></span>
								</label>
							<? } ?>
						</div>
					</div>
					<input type="hidden" name="id_menu" value="<?=$menu->id_menu?>">
					<div class="add-to-cart">
						<input type="submit" value="Add to cart" class="cart-button">
						<div class="price">
							<span id="price"><?=$menu->defaultProduct->getPrice()?></span>
							<span class="currency"><?=$menu->defaultProduct->getCurrency()?></span>
						</div>
					</div>
				</div>
			</form>
		</li>	
	<? } ?>
</ul>