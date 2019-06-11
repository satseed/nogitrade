<div id="colorlib-main">
	<div class="colorlib-contact">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
					<h2 class="colorlib-heading heading">メール・パスワード変更</h2>
				</div>
			</div>
			<form method="post" action="<?php echo base_url('mypage/email_password/').$user_mail_pass[0]['access_id']; ?>">
			<div class="row">
				<div class="col-md-7 col-md-push-1" style="left:0;">
					<div class="row">
						<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
							<form action="<?php echo base_url('login'); ?>" method="post">
								<div class="form-group">
									<label>メールアドレス</label>
									<span style="color:red;"><?php echo form_error('email'); ?></span>
									<input class="form-control" type="text" name="email" value="<?php echo $user_mail_pass[0]['email']; ?>">
								</div>
								<div class="form-group">
									<label>現在のパスワード</label>
									<span style="color:red;"><?php echo form_error('current_password'); ?></span>
									<input class="form-control" type="password" name="current_password" value="<?php echo set_value('current_password'); ?>">
								</div>
								<div class="form-group">
									<label>新しいパスワード（パスワードは6〜12文字の英数字でお願いします）</label>
									<span style="color:red;"><?php echo form_error('password'); ?></span>
									<input class="form-control" type="password" name="password" value="<?php echo set_value('password'); ?>">
								</div>
								<div class="form-group">
									<label>新しいパスワード（確認）</label>
									<span style="color:red;"><?php echo form_error('password_confirmation'); ?></span>
									<input class="form-control" type="password" name="password_confirmation" value="<?php echo set_value('password_confirmation'); ?>">
								</div>
								<div class="form-group">
									<a href="<?php echo base_url('forget_password'); ?>"><h5 style="text-align:center;">パスワードを忘れた方はこちら</h5></a>
								</div>
								<div class="form-group">
									<input type="hidden" name="regist" value="1">
									<input type="submit" class="btn btn-lg btn-block btn-primary" value="会員登録する">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--
<div id="fh5co-main">
	<div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
		<div class="row">
			<div class="col-md-4">
				<h2>メール・パスワード変更</h2>
			</div>
		</div>
		<form method="post" action="<?php echo base_url('mypage/email_password/').$user_mail_pass[0]['access_id']; ?>">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group" style="clear:both;">
								<label>メールアドレス</label>
								<span style="color:red;"><?php echo form_error('email'); ?></span>
								<input class="form-control" type="text" name="email" value="<?php echo $user_mail_pass[0]['email']; ?>">
							</div>
							<div class="form-group">
								<label>現在のパスワード</label>
								<span style="color:red;"><?php echo form_error('current_password'); ?></span>
								<input class="form-control" type="password" name="current_password" value="<?php echo set_value('current_password'); ?>">
							</div>
							<div class="form-group">
								<label>新しいパスワード（パスワードは6〜12文字の英数字でお願いします）</label>
								<span style="color:red;"><?php echo form_error('password'); ?></span>
								<input class="form-control" type="password" name="password" value="<?php echo set_value('password'); ?>">
							</div>
							<div class="form-group">
								<label>新しいパスワード（確認）</label>
								<span style="color:red;"><?php echo form_error('password_confirmation'); ?></span>
								<input class="form-control" type="password" name="password_confirmation" value="<?php echo set_value('password_confirmation'); ?>">
							</div>
							<div class="form-group">
								<input type="hidden" name="regist" value="1">
								<input type="submit" class="btn btn-lg btn-success btn-block" value="変更する">
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</form>
	</div>
</div>
-->