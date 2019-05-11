		<div id="colorlib-main">
			<aside id="colorlib-hero" class="js-fullheight">
				<div class="flexslider js-fullheight">
					<ul class="slides">
				   	<li style="background-image: url(images/trade_header.jpg);">
				   		<div class="overlay"></div>
				   		<div class="container-fluid">
				   			<div class="row">
					   			<div class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 js-fullheight slider-text">
					   				
					   			</div>
					   		</div>
				   		</div>
				   	</li>
				  	</ul>
			  	</div>
			</aside>

			<!-- 出品 -->
			<!-- 検索結果がない時は最新の10件を表示 -->
			<div class="colorlib-work">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<?php if(empty($sresult)): ?>
								<h2 class="colorlib-heading animate-box">最新出品商品</h2>
							<?php else: ?>
								<h2 class="colorlib-heading animate-box">検索結果商品（<?php echo count($sresult); ?>件）</h2>
							<?php endif; ?>
						</div>
					</div>
					<?php if(empty($sresult)): ?> 
						<div class="row">
							<?php foreach($products as $product): ?>
								<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
									<?php if($product['img-1'] != NULL): ?>
										<?php if($product['flag'] == 1): ?>
										    <div class="project during_trading" style="background-image: url(<?php echo ('images/').$product['img-1'] ?>);">
										<?php else: ?>
										    <div class="project " style="background-image: url(<?php echo ('images/').$product['img-1'] ?>);"></a>
										<?php endif; ?>
									<? else: ?>
										<div class="project" style="background-image: url(images/no-img.jpg);">
									<?php endif; ?>
										<div class="desc">
											<div class="con">
												<h3><a href="<?php echo base_url('product/product_detail/').$product['product_id'] ?>"><?php echo $product['product_name']; ?></a></h3>
												<span><?php echo $product['nickname']; ?>さんの出品</span>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php else: ?>
						<div class="row">
							<?php foreach($sresult as $srsl): ?>
								<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
									<?php if(file_exists("images/${srsl['img-1']}")): ?>
										<div class="project" style="background-image: url(<?php echo ('images/').$srsl['img-1'] ?>);">
									<? else: ?>
										<div class="project" style="background-image: url(images/no-img.jpg);">
									<?php endif; ?>
										<div class="desc">
											<div class="con">
												<h3><a href="#"><?php echo $srsl['product_name']; ?></a></h3>
												<span><?php echo $srsl['nickname']; ?>さんの出品</span>
												<p class="icon">
													<span><a href="#"><i class="icon-share3"></i></a></span>
													<span><a href="#"><i class="icon-eye"></i> 100</a></span>
													<span><a href="#"><i class="icon-heart"></i> 49</a></span>
												</p>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</body>
</html>