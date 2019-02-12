	<div id="colorlib-main">
		<div class="colorlib-about">
			<div class="colorlib-narrow-content">
				<div class="row row-bottom-padded-md">
					<div class="col-md-7">
						<?php if($pro_detail['img-1'] != NULL): ?>
							<div class="col-img">
								<img src="<?php echo base_url('images/'.$pro_detail['img-1']); ?>">
							</div>
						<?php endif; ?>
						<?php if($pro_detail['img-2'] != NULL): ?>
							<div class="col-img">
								<img src="<?php echo base_url('images/'.$pro_detail['img-2']); ?>">
							</div>
						<?php endif; ?>
						<?php if($pro_detail['img-3'] != NULL): ?>
							<div class="col-img">
								<img src="<?php echo base_url('images/'.$pro_detail['img-3']); ?>">
							</div>
						<?php endif; ?>
						<?php if($pro_detail['img-4'] != NULL): ?>
							<div class="col-img">
								<img src="<?php echo base_url('images/'.$pro_detail['img-4']); ?>">
							</div>
						<?php endif; ?>
					</div>
				</div>

				<!-- 商品名と説明 -->
				<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="about-desc">
						<h2 class="colorlib-heading"><?php echo $pro_detail['product_name']; ?></h2>
						<p><?php echo $pro_detail['description']; ?></p>
					</div>
				</div>

				<!-- トレードのやりとり -->
				<?php if($pro_detail['nickname'] != $nickname): ?>
					<div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
						<div class="row">
							<div class="col-md-10">
								<?php if($log == 1): ?>
									<h2>トレードを希望する</h2>
								<?php else: ?>
									<h3 style="margin-bottom:30px; line-height:1.5em; margin-top:50px;">トレードを希望するには会員登録をしてください。</h3>
								<?php endif ;?>
							</div>
						</div>
						<form action="<?php echo base_url('product/product_detail/').$pro_detail['product_id']; ?>" method="post">
							<div class="row">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-6">
											<?php if($log == 1): ?>
												<div class="form-group">
													<label>ニックネーム</label>
													<span style="color:red;"><?php echo form_error('nickname'); ?></span>
													<input type="text" class="form-control" name='nickname' value="<?php echo $nickname; ?>" >
												</div>

											<div class="form-group">
												<label>メールアドレス</label>
												<span style="color:red;"><?php echo form_error('email'); ?></span>
												<input type="text" class="form-control" name='email' value="<?php echo $email; ?>" >
											</div>
											<div class="form-group">
												<label>トレード条件</label>
												<span style="color:red;"><?php echo form_error('condition'); ?></span>
												<textarea name="condition" id="message" cols="30" rows="7" class="form-control" placeholder="トレードの条件を記入して出品者に伝えてください。"></textarea>
											</div>
											<?php endif; ?>
											<div class="form-group">
												<?php if($log == 1): ?>
													<input type="hidden" name="product_id" value="<?php echo $pro_detail['product_id']; ?>">
													<input type="submit" class="btn btn-primary btn-md" value="メッセージを送る">
												<?php else: ?>
													<button type="button" class="btn btn-success btn-lg"><a href="<?php echo base_url('registration') ?>" style="color:white;">会員登録する</a></button>
												<?php endif ;?>
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</form>
					</div>
				<?php elseif(($pro_detail['nickname'] === $nickname) && ($trade_application)): ?>
					<div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
						<div class="row">
							<div class="col-md-4" style="width:60%;">
								<h2>トレード依頼状況</h2>
							</div>
						</div>
						<form action="<?php echo base_url('product/product_detail/').$pro_detail['product_id']; ?>" method="post">
							<?php foreach($interaction_data as $key => $inter_data): ?>
							<div class="row">
								<div class="col-md-12">
									
									<div class="row">
										<div class="col-md-6">
											<!--①LINE会話全体を囲う-->
											<div class="line-bc">
												<div class="alert alert-info">
													<!--?php foreach($interaction_data as $inter_data): ?-->
														<div class="alert alert-success">
															<p class="alert-link openBtn">
																<i class="fa fa-chevron-down faColor">&nbsp;<?php echo $inter_data['from_name']; ?>さんからトレードの申し込みがきています。</i>
																<i class="fa fa-arrow-circle-right">&nbsp;<a href="<?php echo base_url('product/reply/').$inter_data['product_id']; ?>">返信する</a></i>
															</p>
															<?php foreach ($inter_data['from_condition'] as $key => $from_condition): ?>
																<?php foreach($from_condition as $fc): ?>
																	<?php if($key != $nickname): ?>
																		<p class="trade">
																			<?php echo $fc; ?>
																		</p>
																	<?php else: ?>
																		<p class="accep"><?php echo $fc; ?></p>
																	<?php endif; ?>
																<?php endforeach; ?>
															<?php endforeach; ?>
															<input type="hidden" value="2" ?>
														</div>
												<!--?php endforeach; ?-->
											</div>
											<!--/①LINE会話終了-->
										</div>
									</div>
									
								</div>
							</div>
							<?php endforeach; ?>
						</form>
					</div>
				<?php else: ?>
					<div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
						<div class="row">
							<div class="col-md-4" style="width:60%; margin-top: 50px;">
								<h2>まだトレードの申し込みはありません</h2>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<!--div class="row">
					<div class="col-md-8 animate-box" data-animate-effect="fadeInRight">
						<div class="fancy-collapse-panel">
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
								<div class="panel panel-default">
								    <div class="panel-heading" role="tab" id="headingOne">
								        <h4 class="panel-title">
								            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Why choose me?
								            </a>
								        </h4>
								    </div>
								    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
								         <div class="panel-body">
								            <div class="row">
									      		<div class="col-md-6">
									      			<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
									      		</div>
									      		<div class="col-md-6">
									      			<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
									      		</div>
									      	</div>
								         </div>
								    </div>
								</div>
								<div class="panel panel-default">
								    <div class="panel-heading" role="tab" id="headingTwo">
								        <h4 class="panel-title">
								            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">What I do?
								            </a>
								        </h4>
								    </div>
								    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
								        <div class="panel-body">
								            <p>Far far away, behind the word <strong>mountains</strong>, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
												<ul>
													<li>Separated they live in Bookmarksgrove right</li>
													<li>Separated they live in Bookmarksgrove right</li>
												</ul>
								        </div>
								    </div>
								</div>
								<div class="panel panel-default">
								    <div class="panel-heading" role="tab" id="headingThree">
								        <h4 class="panel-title">
								            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">My Specialties
								            </a>
								        </h4>
								    </div>
								    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
								        <div class="panel-body">
								            <p>Far far away, behind the word <strong>mountains</strong>, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>	
								        </div>
								    </div>
								</div>
							</div>
						</div>
					</div>
				</div-->
			</div>
		</div>
	</div>
</div>

<!--div id="fh5co-main">
	<div class="fh5co-narrow-content">
		<div class="row row-bottom-padded-md">
			<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft" style="margin-bottom: 30px;">
				<?php if(file_exists("images/${pro_detail['img-1']}")): ?>
					<img class="img-responsive" src="<?php echo base_url('images/').$pro_detail['img-1']; ?>" class="img-responsive" alt="<?php echo $pro_detail['product_name']; ?>">
				<?php else: ?>
					<img class="img-responsive" src="<?php echo base_url('images/marble/no_image.gif'); ?>" class="img-responsive" alt="no image">
				<?php endif; ?>
			</div>
			<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft" style="margin-bottom: 30px;">
				<?php if(file_exists("images/${pro_detail['img-2']}")): ?>
					<img class="img-responsive" src="<?php echo base_url('images/').$pro_detail['img-2']; ?>" class="img-responsive" alt="<?php echo $pro_detail['product_name']; ?>">
				<?php else: ?>
					<img class="img-responsive" src="<?php echo base_url('images/marble/no_image.gif'); ?>" class="img-responsive" alt="no image">
				<?php endif; ?>
			</div>
			<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
				<?php if(file_exists("images/${pro_detail['img-3']}") && $pro_detail['img-3'] != null): ?>
					<img class="img-responsive" src="<?php echo base_url('images/').$pro_detail['img-3']; ?>" class="img-responsive" alt="<?php echo $pro_detail['product_name']; ?>">
				<?php endif; ?>
			</div>
			<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
				<?php if(file_exists("images/${pro_detail['img-4']}") && $pro_detail['img-4'] != null): ?>
					<img class="img-responsive" src="<?php echo base_url('images/').$pro_detail['img-4']; ?>" class="img-responsive" alt="<?php echo $pro_detail['product_name']; ?>">
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="fh5co-narrow-content">
		<div class="trade_table">
			<table border="1" class="table-striped">
				<tr>
					<td class="top" colspan="2">商品情報</td>
				</tr>
				<tr>
					<td>出品者名</td>
					<td><?php echo $pro_detail['nickname']; ?></td>
				</tr>
				<tr>
					<td>商品名</td>
					<td><?php echo $pro_detail['product_name']; ?></td>
				</tr>
				<tr>
					<td>商品詳細</td>
					<td><?php echo nl2br($pro_detail['description']); ?></td>
				</tr>
				<tr>
					<td>トレード条件</td>
					<td><?php echo nl2br($pro_detail['conditions']); ?></td>
				</tr>
				<tr>
					<td>商品の保存状態</td>
					<td><?php echo nl2br($pro_detail['preservation']); ?></td>
				</tr>
				<tr>
					<td>出品日</td>
					<td><?php echo $pro_detail['create_data']; ?></td>
				</tr>
			</table>
		</div>
	</div>

	<!-- ログイン中の名前と出品者の名前が一致しない時に表示を変える -->
<!--
	<?php if($pro_detail['nickname'] != $nickname): ?>
		<div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
			<div class="row">
				<div class="col-md-4">
					<?php if($log == 1): ?>
						<h2>トレードを希望する</h2>
					<?php else: ?>
						<h3 style="margin-bottom:30px; line-height:1.5em;">トレードを希望するには会員登録をしてください。</h3>
					<?php endif ;?>
				</div>
			</div>
			<form action="<?php echo base_url('product/product_detail/').$pro_detail['product_id']; ?>" method="post">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<?php if($log == 1): ?>
									<div class="form-group">
										<label>ニックネーム</label>
										<span style="color:red;"><?php echo form_error('nickname'); ?></span>
										<input type="text" class="form-control" name='nickname' value="<?php echo $nickname; ?>" >
									</div>

								<div class="form-group">
									<label>メールアドレス</label>
									<span style="color:red;"><?php echo form_error('email'); ?></span>
									<input type="text" class="form-control" name='email' value="<?php echo $email; ?>" >
								</div>
								<div class="form-group">
									<label>トレード条件</label>
									<span style="color:red;"><?php echo form_error('condition'); ?></span>
									<textarea name="condition" id="message" cols="30" rows="7" class="form-control" placeholder="トレードの条件を記入して出品者に伝えてください。"></textarea>
								</div>
								<?php endif; ?>
								<div class="form-group">
									<?php if($log == 1): ?>
										<input type="hidden" name="product_id" value="<?php echo $pro_detail['product_id']; ?>">
										<input type="submit" class="btn btn-primary btn-md" value="メッセージを送る">
									<?php else: ?>
										<button type="button" class="btn btn-success btn-lg"><a href="<?php echo base_url('registration') ?>" style="color:white;">会員登録する</a></button>
									<?php endif ;?>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</form>
		</div>
	<?php elseif(($pro_detail['nickname'] === $nickname) && ($trade_application)): ?>
		<div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
			<div class="row">
				<div class="col-md-4" style="width:60%;">
					<h2>トレード依頼状況</h2>
				</div>
			</div>
			<form action="<?php echo base_url('product/product_detail/').$pro_detail['product_id']; ?>" method="post">
				<?php foreach($interaction_data as $key => $interdata): ?>
				<div class="row">
					<div class="col-md-12">
						
						<div class="row">
							<div class="col-md-6">
-->								
								<!--①LINE会話全体を囲う-->
<!--
								<div class="line-bc">
									<div class="alert alert-info">
										<?php foreach($interaction_data as $inter_data): ?>
									<div class="alert alert-success">
										<p class="alert-link openBtn">
											<?php foreach($inter_data['from_name'] as $fn): ?>
											<i class="fa fa-chevron-down faColor">&nbsp;<?php echo $fn; ?>さんからトレードの申し込みがきています。</i>
											<?php endforeach; ?>
											<i class="fa fa-arrow-circle-right">&nbsp;<a href="<?php echo base_url('product/reply/').$inter_data['product_id']; ?>">返信する</a></i>
										<p class="trade">
											<?php foreach ($inter_data['from_condition'] as $fc): ?>
											<?php echo $fc; ?>
											<?php endforeach; ?>
										</p>
										<input type="hidden" value="2" ?>
									</div>
								<?php endforeach; ?>
								</div>
-->
								<!--/①LINE会話終了-->
<!--
								<input type="hidden" value="2" ?>
								</div>
-->
								<!--
								<?php foreach($interaction_data as $inter_data): ?>
									<div class="alert alert-success">
										<p class="alert-link openBtn">
											<?php foreach($inter_data['from_name'] as $fn): ?>
											<i class="fa fa-chevron-down faColor">&nbsp;<?php echo $fn; ?>さんからトレードの申し込みがきています。</i>
											<?php endforeach; ?>
											<i class="fa fa-arrow-circle-right">&nbsp;<a href="<?php echo base_url('product/reply/').$inter_data['product_id']; ?>">返信する</a></i>
										<p class="trade">
											<?php foreach ($inter_data['from_condition'] as $fc): ?>
											<?php echo $fc; ?>
											<?php endforeach; ?>
										</p>
										<input type="hidden" value="2" ?>
									</div>
								<?php endforeach; ?>
								
							</div>
						</div>
						
					</div>
				</div>
				<?php endforeach; ?>
			</form>
		</div>
	<?php else: ?>
		<div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
			<div class="row">
				<div class="col-md-4" style="width:60%;">
					<h2>まだトレードの申し込みはありません</h2>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>
-->
<script type="text/javascript">
$(function(){
  $(".openBtn").click(function(){
	$($(this).next(".trade")).animate(
	  {height: "toggle", opacity: "toggle"},

	  1000
	);
  });

  $('.slider').each(function(){
		$(this).slick({
			autoplay:true,
			autoplaySpeed:5000,
			dots:true,
		});
	});	
});
</script>
<!-- <a href="<?php echo base_url('product/reply/').$ta['product_id']; ?>"><button>返信する</button></a> -->