<? use yii\helpers\Html; ?>
<ul class="items">
	<? foreach($menu as $item){ ?>
		<li class="item">
			<div class="product">
				<div class="about">
					<picture class="image">
						<?= Html::img('@web/image/'.$item->image, ['alt'=>$item->name, 'height'=>'230', 'width'=>'292']);?>
					</picture>
					<div class="title">
						<h3><?=$item->name?></h3>
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
								<?=$item->nutrition?>
							</div>
						</div>
					</div>
					<div class="description"><?=$item->description?></div>
				</div>
				<div class="cart">
					<div class="parameters">
						<div class="type">
							<div>Traditional</div>
							<div>Thin</div>
						</div>
						<div class="_2n5maMVyMKs6pwgh3QYrgq">
							<div class="selector_size">
								<div class="selector" style="width: 25%; transform: translateX(0%);"></div>
								<div class="size active">23 cm</div>
								<div class="size">30</div>
								<div class="size">35</div>
								<div class="size">40</div>
							</div>
						</div>
					</div>
					<div class="add-to-cart">
						<button type="button" class="cart-button">
							<span>Add to cart</span>
						</button>
						<div class="price">
							<span id="price">399 
							<span class="currency">₽</span>
						</div>
					</div>
				</div>
			</div>
		</li>	
	<? } ?>
</ul>