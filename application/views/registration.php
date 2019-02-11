<div id="colorlib-main">
	<div class="colorlib-contact">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
					<h2 class="colorlib-heading">会員登録</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-7 col-md-push-1" style="left:0;">
					<div class="row">
						<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
							<form action="<?php echo base_url('home/registration'); ?>" method="post">
								<div class="form-group">
									<label>名前（他のユーザーに表示されることはありません）</label>
									<span style="color:red;"><?php echo form_error('name'); ?></span>
									<input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>">
								</div>
								<div class="form-group">
									<label>ふりがな（他のユーザーに表示されることはありません）</label>
									<span style="color:red;"><?php echo form_error('phonetic'); ?></span>
									<input type="text" name="phonetic" class="form-control" value="<?php echo set_value('phonetic'); ?>">
								</div>
								<div class="form-group">
									<label>ニックネーム</label>
									<span style="color:red;"><?php echo form_error('nickname'); ?></span>
									<input class="form-control" type="text" name="nickname" value="<?php echo set_value('nickname'); ?>">
								</div>
								<div class="form-group" style="width:20%; display:inline-block; margin-right:15px;">
									<label>年</label>
									<span style="color:red;"><?php echo form_error('year'); ?></span>
									<select class="form-control" name="year" value="<?php echo set_value('year'); ?>">
										<option value="">--</option>
										<?php for($y=1920; $y<=date('Y'); $y++): ?>
											<option value="<?php echo $y; ?>"><?php echo $y; ?></option>
										<?php endfor;?>
									</select>
								</div>
								<div class="form-group" style="width:20%; display:inline-block; margin-right:15px;">
									<label>月</label>
									<span style="color:red;"><?php echo form_error('month'); ?></span>
									<select class="form-control" name="month" value="<?php echo set_value('month'); ?>">
										<option value="">--</option>
										<?php for($m=1; $m<=12; $m++): ?>
											<option value="<?php echo $m; ?>"><?php echo $m; ?></option>
										<?php endfor;?>
									</select>
								</div>
								<div class="form-group" style="width:20%; display:inline-block; margin-right:15px;">
								<label>日</label>
								<span style="color:red;"><?php echo form_error('day'); ?></span>
								<select class="form-control" name="day" value="<?php echo set_value('day'); ?>">
									<option value="">--</option>
									<?php for($d=1; $d<=31; $d++): ?>
										<option value="<?php echo $d; ?>"><?php echo $d; ?></option>
									<?php endfor;?>
								</select>
								</div>
								<div class="form-group" style="clear:both;">
									<label>年齢</label>
									<span style="color:red;"><?php echo form_error('age'); ?></span>
									<input class="form-control" type="text" name="age" value="<?php echo set_value('age'); ?>">
								</div>
								<div class="form-group">
									<label>パスワード（パスワードは6〜12文字の英数字でお願いします）</label><br />
									<span style="color:red;"><?php echo form_error('password'); ?></span>
									パスワードを表示 <input type="checkbox" id="passcheck" /><input class="form-control" id="password" type="password" name="password" value="<?php echo set_value('password'); ?>">
								</div>
								<div class="form-group">
									<label>郵便番号（ハイフン不要）</label>
									<span style="color:red;"><?php echo form_error('postal'); ?></span>
									<input class="form-control" type="text" name="postal" size="10" maxlength="7" onKeyUp="AjaxZip3.zip2addr(this,'','prefectures','address');" value="<?php echo set_value('postal'); ?>">
								</div>
								<div class="form-group">
									<label>都道府県</label>
									<span style="color:red;"><?php echo form_error('prefectures'); ?></span>
									<input class="form-control" type="text" name="prefectures" value="<?php echo set_value('prefectures'); ?>">
								</div>
								<div class="form-group">
									<label>住所（番地なども詳しく記入してください。）</label>
									<span style="color:red;"><?php echo form_error('address'); ?></span>
									<input class="form-control" type="text" name="address" value="<?php echo set_value('address'); ?>">
								</div>
								<div class="form-group">
									<label>メールアドレス</label>
									<span style="color:red;"><?php echo form_error('email'); ?></span>
									<input class="form-control" type="text" name="email" value="<?php echo set_value('email'); ?>">
								</div>
								<div class="form-group">
									<label>自己紹介文（任意）（後ほどプロフィールから変更できます）</label>
									<span style="color:red;"><?php echo form_error('introduction'); ?></span>
									<textarea name="introduction" id="message" cols="30" rows="7" class="form-control" placeholder="トレードを希望する人に向けた軽い自己紹介文を書きましょう。気持ちよく取引を行ってもらうために是非書いておきましょう。"></textarea>
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-lg btn-primary btn-block" value="会員登録する">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--div id="fh5co-main">
	<div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
		
		<div class="row">
			<div class="col-md-4">
				<h2>会員登録をして下さい。</h2>
			</div>
		</div>
		<form method="post" action="<?php echo base_url('home/registration'); ?>">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>名前（他のユーザーに表示されることはありません）</label>
								<span style="color:red;"><?php echo form_error('name'); ?></span>
								<input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>">
							</div>
							<div class="form-group">
								<label>ふりがな（他のユーザーに表示されることはありません）</label>
								<span style="color:red;"><?php echo form_error('phonetic'); ?></span>
								<input type="text" name="phonetic" class="form-control" value="<?php echo set_value('phonetic'); ?>">
							</div>
							<div class="form-group">
								<label>ニックネーム</label>
								<span style="color:red;"><?php echo form_error('nickname'); ?></span>
								<input class="form-control" type="text" name="nickname" value="<?php echo set_value('nickname'); ?>">
							</div>
							<div class="form-group" style="width:20%; display:inline-block; margin-right:15px;">
								<label>年</label>
								<span style="color:red;"><?php echo form_error('year'); ?></span>
								<select class="form-control" name="year" value="<?php echo set_value('year'); ?>">
									<option value="">--</option>
									<?php for($y=1920; $y<=date('Y'); $y++): ?>
										<option value="<?php echo $y; ?>"><?php echo $y; ?></option>
									<?php endfor;?>
								</select>
							</div>
							<div class="form-group" style="width:20%; display:inline-block; margin-right:15px;">
								<label>月</label>
								<span style="color:red;"><?php echo form_error('month'); ?></span>
								<select class="form-control" name="month" value="<?php echo set_value('month'); ?>">
									<option value="">--</option>
									<?php for($m=1; $m<=12; $m++): ?>
										<option value="<?php echo $m; ?>"><?php echo $m; ?></option>
									<?php endfor;?>
								</select>
							</div>
							<div class="form-group" style="width:20%; display:inline-block; margin-right:15px;">
								<label>日</label>
								<span style="color:red;"><?php echo form_error('day'); ?></span>
								<select class="form-control" name="day" value="<?php echo set_value('day'); ?>">
									<option value="">--</option>
									<?php for($d=1; $d<=31; $d++): ?>
										<option value="<?php echo $d; ?>"><?php echo $d; ?></option>
									<?php endfor;?>
								</select>
							</div>
							<div class="form-group" style="clear:both;">
								<label>年齢</label>
								<span style="color:red;"><?php echo form_error('age'); ?></span>
								<input class="form-control" type="text" name="age" value="<?php echo set_value('age'); ?>">
							</div>
							<div class="form-group">
								<label>パスワード（パスワードは6〜12文字の英数字でお願いします）</label><br />
								<span style="color:red;"><?php echo form_error('password'); ?></span>
								パスワードを表示 <input type="checkbox" id="passcheck" /><input class="form-control" id="password" type="password" name="password" value="<?php echo set_value('password'); ?>">
							</div>
							<div class="form-group">
								<label>郵便番号（ハイフン不要）</label>
								<span style="color:red;"><?php echo form_error('postal'); ?></span>
								<input class="form-control" type="text" name="postal" size="10" maxlength="7" onKeyUp="AjaxZip3.zip2addr(this,'','prefectures','address');" value="<?php echo set_value('postal'); ?>">
							</div>
							<div class="form-group">
								<label>都道府県</label>
								<span style="color:red;"><?php echo form_error('prefectures'); ?></span>
								<input class="form-control" type="text" name="prefectures" value="<?php echo set_value('prefectures'); ?>">
							</div>
							<div class="form-group">
								<label>住所（番地なども詳しく記入してください。）</label>
								<span style="color:red;"><?php echo form_error('address'); ?></span>
								<input class="form-control" type="text" name="address" value="<?php echo set_value('address'); ?>">
							</div>
							<div class="form-group">
								<label>メールアドレス</label>
								<span style="color:red;"><?php echo form_error('email'); ?></span>
								<input class="form-control" type="text" name="email" value="<?php echo set_value('email'); ?>">
							</div>
							<div class="form-group">
								<label>自己紹介文（任意）（後ほどプロフィールから変更できます）</label>
								<span style="color:red;"><?php echo form_error('introduction'); ?></span>
								<textarea name="introduction" id="message" cols="30" rows="7" class="form-control" placeholder="トレードを希望する人に向けた軽い自己紹介文を書きましょう。気持ちよく取引を行ってもらうために是非書いておきましょう。"></textarea>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-lg btn-success btn-block" value="会員登録する">
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</form>
	</div>
</div-->

<script>
$(function() {
	$('#passcheck').change(function(){
		if ( $(this).prop('checked') ) {
			$('#password').attr('type','text');
		} else {
			$('#password').attr('type','password');
		}
	});
});
</script>