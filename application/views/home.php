		<div id="colorlib-main">
			<aside id="colorlib-hero" class="js-fullheight">
				<div class="flexslider js-fullheight">
					<ul class="slides">
				   	<li style="background-image: url(images/hasimoto.jpg);">
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
							<h2 class="colorlib-heading animate-box">最新出品商品</h2>
						</div>
					</div>
					<?php if(!isset($sresult)): ?> 
					<div class="row">
						<?php foreach($products as $product): ?>
							<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
								<?php if($product['img-1'] != NULL): ?>
									<div class="project" style="background-image: url(<?php echo ('images/').$product['img-1'] ?>);"></a>
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

			<div class="colorlib-blog">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Read</span>
							<h2 class="colorlib-heading">Recent Blog</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
							<div class="blog-entry">
								<a href="blog.html" class="blog-img"><img src="images/blog-1.jpg" class="img-responsive" alt="HTML5 Bootstrap Template by colorlib.com"></a>
								<div class="desc">
									<span><small>April 14, 2018 </small> | <small> Web Design </small> | <small> <i class="icon-bubble3"></i> 4</small></span>
									<h3><a href="blog.html">Renovating National Gallery</a></h3>
									<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
							<div class="blog-entry">
								<a href="blog.html" class="blog-img"><img src="images/blog-2.jpg" class="img-responsive" alt="HTML5 Bootstrap Template by colorlib.com"></a>
								<div class="desc">
									<span><small>April 14, 2018 </small> | <small> Web Design </small> | <small> <i class="icon-bubble3"></i> 4</small></span>
									<h3><a href="blog.html">Wordpress for a Beginner</a></h3>
									<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
							<div class="blog-entry">
								<a href="blog.html" class="blog-img"><img src="images/blog-3.jpg" class="img-responsive" alt="HTML5 Bootstrap Template by colorlib.com"></a>
								<div class="desc">
									<span><small>April 14, 2018 </small> | <small> Inspiration </small> | <small> <i class="icon-bubble3"></i> 4</small></span>
									<h3><a href="blog.html">Make website from scratch</a></h3>
									<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div id="get-in-touch" class="colorlib-bg-color">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
							<h2>Get in Touch!</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<p class="colorlib-lead">Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
							<p><a href="#" class="btn btn-primary btn-learn">Contact me!</a></p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Sticky Kit -->
	<script src="js/sticky-kit.min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Counters -->
	<script src="js/jquery.countTo.js"></script>
	
	
	<!-- MAIN JS -->
	<script src="js/main.js"></script>

	</body>
</html>