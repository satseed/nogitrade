<div id="colorlib-main">
	<div class="colorlib-contact">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
					<h2 class="colorlib-heading">パスワードの再設定を行ってください。</h2>
					<?php if(isset($error)): ?>
						<span style="color:red;"><?php echo $error; ?></span>
					<?php endif; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-7 col-md-push-1" style="left:0;">
					<div class="row">
						<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
							<form action="<?php echo base_url('forget_password'); ?>" method="post">
								<div class="form-group">
								<span style="color:red;"><?php echo form_error('restemail'); ?></span>
								<input class="form-control" placeholder="登録済みのメールアドレス" name="restemail" type="text" value="<?php echo set_value('restemail'); ?>">
							</div>
							<div class="form-group">
								<span style="color:red;"><?php echo form_error('restpassword'); ?></span>
								パスワードを表示 <input type="checkbox" id="passcheck" /><input class="form-control" id="restpassword" placeholder="新しいパスワード" name="restpassword" type="password" value="<?php echo set_value('restpassword'); ?>">
							</div>
							<div class="form-group">
								<span style="color:red;"><?php echo form_error('password_confirmation'); ?></span>
								<input class="form-control" placeholder="新しいパスワード（確認用）" name="password_confirmation" type="password" value="<?php echo set_value('password_confirmation'); ?>">
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-lg btn-primary btn-block" value="パスワードを再設定する">
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
$(function() {
	$('#passcheck').change(function(){
		if ( $(this).prop('checked') ) {
			$('#restpassword').attr('type','text');
		} else {
			$('#restpassword').attr('type','password');
		}
	});
});
</script>