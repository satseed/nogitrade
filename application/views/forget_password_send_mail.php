<div id="fh5co-main">
	<div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
		
		<div class="row">
			<div class="col-md-4">
				<h4>登録しているメールアドレスを入力してください。</h4>
				<?php if(isset($error)): ?>
					<h4><span style="color:red;"><?php echo $error; ?></span></h4>
				<?php endif; ?>
			</div>
		</div>
		<form role="form" method="post" action="<?php echo base_url('forget_password'); ?>">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<span style="color:red;"><?php echo form_error('email'); ?></span>
                        		<input class="form-control" placeholder="メールアドレス" name="email" type="email" value="<?php echo set_value('email'); ?>" autofocus>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-lg btn-success btn-block" value="送信する">
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>