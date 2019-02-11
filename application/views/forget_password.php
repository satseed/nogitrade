<div id="fh5co-main">
	<div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
		
		<div class="row">
			<div class="col-md-4">
				<h2>パスワードの再設定を行ってください。</h2>
				<?php if(isset($error)): ?>
					<h4><span style="color:red;"><?php echo $error; ?></span></h4>
				<?php endif; ?>
			</div>
		</div>
		<form role="form" method="post" action="<?php echo base_url('home/forget_password'); ?>">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
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
								<input type="submit" class="btn btn-lg btn-success btn-block" value="ログインする">
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
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