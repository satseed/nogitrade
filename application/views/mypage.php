	<!--h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">出品リスト一覧</h2>-->
	<div id="colorlib-main">
		<div class="colorlib-services">
			<div class="colorlib-narrow-content">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
						<?php if(($log == 1) && ($seller == $nickname)): ?>
							<h2 class="colorlib-heading"><?php echo $seller; ?>さんのページ</h2>
						<?php else: ?>
							<h2 class="colorlib-heading"><?php echo $seller; ?>さんの出品一覧</h2>
						<?php endif; ?>	
					</div>
				</div>
				<div class="row row-bottom-padded-md" style="width:1100px;">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12">
								<div class="colorlib-feature animate-box" data-animate-effect="fadeInLeft">
									<div class="colorlib-icon">
										<i class="fa fa-user-circle-o"></i>
									</div>
									<div class="colorlib-text">
										<h3>名前</h3>
										<p><?php echo $seller; ?> <span class="ajax-iine" data-iid="ielfwcbmwisrb12vawz5" data-tid="t1003"></p>
									</div>
								</div>

								<div class="colorlib-feature animate-box" data-animate-effect="fadeInLeft">
									<div class="colorlib-icon">
										<i class="fas fa-pen-nib"></i>
									</div>
									<div class="colorlib-text">
										<h3>自己紹介</h3>
										<p><?php echo nl2br($introduction); ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12">
								<div class="colorlib-feature animate-box" data-animate-effect="fadeInLeft">
									<div class="colorlib-icon">
										<i class="fa fa-home"></i>
									</div>
									<div class="colorlib-text">
										<h3>発送地域</h3>
										<p><?php echo $prefectures; ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
					<?php if($count_usd > 0): ?>
						<h2 class="colorlib-heading">出品一覧（<?php echo $count_usd; ?>件）</h2>
					<?php else: ?>
						<h2 class="colorlib-heading">まだ出品はしていません</h2>
					<?php endif; ?>
				</div>
				<?php foreach($lists as $list): ?>
					<div class="row" style="float:left; width:500px; margin-right: -200px;">
						<div class="col-md-4">
							<a href="<?php echo base_url('product/product_detail/').$list['product_id']; ?>" class="services-wrap animate-box" data-animate-effect="fadeInRight">
								<?php if($list['img-1']): ?>
									<?php if($list['flag'] == 1): ?>
										<div class="services-img  during_trading" style="background-image: url(<?php echo base_url('images/') . $list['img-1'] ?>);"></div>
									<?php else: ?>
										<div class="services-img" style="background-image: url(<?php echo base_url('images/') . $list['img-1'] ?>);"></div>
									<?php endif; ?>
								<? else: ?>
									<?php if($list['flag'] == 1): ?>
										<div class="services-img during_trading" style="background-image: url(<?php echo base_url('images/no-img.jpg') ?>);"></div>
									<?php else: ?>
										<div class="services-img" style="background-image: url(<?php echo base_url('images/no-img.jpg') ?>);"></div>
									<?php endif; ?>
								<?php endif; ?>
								<div class="desc">
									<h3><?php echo $list['product_name']; ?></h3>
								</div>
							</a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>

<!--
	<div id="fh5co-main">
		<div class="fh5co-narrow-content">
			h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">出品リスト一覧</h2>
			<?php if(($log == 1) && ($seller == $nickname)): ?>
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft"><?php echo $seller; ?>さんのページ</h2>
			<?php else: ?>
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft"><?php echo $seller; ?>さんの出品一覧</h2>
			<?php endif; ?>	
			<div class="fh5co-narrow-content">
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">プロフィール</h2>
				<div class="row">
					<div class="col-md-6">
						<div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
							<div class="fh5co-icon">
								<i class="fa fa-user-circle-o"></i>
							</div>
							<div class="fh5co-text">
								<h3>名前</h3>
								<h3><?php echo $seller; ?> <span class="ajax-iine" data-iid="ielfwcbmwisrb12vawz5" data-tid="t1003"></div></h3>
	
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
							<div class="fh5co-icon">
								<i class="fa fa-home"></i>
							</div>
							<div class="fh5co-text">
								<h3>発送地域</h3>
								<h3><?php echo $prefectures; ?></h3>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
							<div class="fh5co-icon">
								<i class="glyphicon glyphicon-pencil"></i>
							</div>
							<div class="fh5co-text">
								<h3>自己紹介</h3>
								<h3 style="line-height:30px;"><?php echo nl2br($introduction); ?></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
-->
			<!-- 出品のサムネイル -->
<!--
			<div class="fh5co-narrow-content">
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">出品一覧：<?php echo $count; ?>件</h2>
				<div class="row row-bottom-padded-md">
					<?php foreach($lists as $list): ?>
						<div class="col-md-3 col-sm-6 col-padding animate-box" data-animate-effect="fadeInLeft">
							<div class="blog-entry">
								<a href="<?php echo base_url('product/product_detail/').$list['product_id']; ?>" class="blog-img">
									<?php if(file_exists("images/${list['img-1']}")): ?>
										<img src="<?php echo base_url('images/').$list['img-1']; ?>" class="img-responsive" alt="<?php echo $list['product_name']; ?>">
									<?php else: ?>
										<img src="<?php echo base_url('images/marble/no_image.gif'); ?>" class="img-responsive" alt="no image">
									<?php endif; ?>
								</a>
								<div class="desc">
									<h3>
										<a href="<?php echo base_url('product/product_detail/').$list['product_id']; ?>"><?php echo $list['product_name']; ?></a>
										<?php if($list['flag'] === '1'): ?>
										<p><span style="color:red;">取引中</span></p>
										<?php endif; ?>
									</h3>
									<a href="<?php echo base_url('product/product_detail/').$list['product_id']; ?>" class="lead"><i class="fa fa-hand-o-right"></i>詳細へ</a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>
-->