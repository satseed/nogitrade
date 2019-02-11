	<div id="fh5co-main">
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
									<div class="line-bc"><!--①LINE会話全体を囲う-->
										<div class="alert alert-info">
											<!-- 折り畳み展開ポインタ -->
											
											<?php var_dump($interdata['from_condition']); ?>
											<div onclick="obj=document.getElementById('open').style; obj.display=(obj.display=='none')?'block':'none';">
											<a class='trade' style="cursor:pointer;">▼ <?php echo $interdata['from_name'][0];?> さんからトレードの申し込みがきています。</a>
											</div>
											<!--// 折り畳み展開ポインタ -->
											 
											<!-- 折り畳まれ部分 -->
											<div id="open" style="display:none;clear:both;">

											<!--ここの部分が折りたたまれる＆展開される部分になります。自由に記述してください。-->
											<!--②左コメント始-->
											<i class="fa fa-arrow-circle-right">&nbsp;<a href="<?php echo base_url('product/reply/').$interdata['product_id']; ?>">返信する<a/></i>
											<div class="balloon6">
												<div class="chatting">
													<div class="says">
														<?php foreach($interdata['from_condition'] as $from): ?>
													<p>
														
														<?php echo $from; ?>
													
													</p>
													<?php endforeach; ?>
													</div>
												</div>
										 	</div>
										 	<!--②/左コメント終-->
												
											<!--③右コメント始-->
											<div class="mycomment">
												<p>
												ありがとうございます。</br>
												もちろん大丈夫です。</br >
												それでお願いします。
												</p>
											</div>
											<!--/③右コメント終-->
										
										</div>
										<!--// 折り畳まれ部分 -->
									</div><!--/①LINE会話終了-->
									<input type="hidden" value="2" ?>
									</div>
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
									-->
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
<script type="text/javascript">
$(function(){
  $(".openBtn").click(function(){
	$($(this).next(".trade")).animate(
	  {height: "toggle", opacity: "toggle"},

	  1000
	);
  });
});
</script>
<!-- <a href="<?php echo base_url('product/reply/').$ta['product_id']; ?>"><button>返信する</button></a> -->