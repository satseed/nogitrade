<div id="fh5co-main">
	<div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
		
		<div class="row">
			<div class="col-md-4">
				<h2 style="font-size:23px;">以下の内容でよろしいですか？</h2>
			</div>
		</div>
		<form method="post" action="<?php echo base_url('home/registration'); ?>">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>名前</label>
								<span style="color:red;"><?php echo form_error('name'); ?></span>
								<input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>">
							</div>
							<div class="form-group">
								<label>ふりがな</label>
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
								<input class="form-control" type="text" name="year" value="<?php echo set_value('year'); ?>">
								</select>
							</div>
							<div class="form-group" style="width:20%; display:inline-block; margin-right:15px;">
								<label>月</label>
								<input class="form-control" type="text" name="month" value="<?php echo set_value('month'); ?>">
							</div>
							<div class="form-group" style="width:20%; display:inline-block; margin-right:15px;">
								<label>日</label>
								<input class="form-control" type="text" name="day" value="<?php echo set_value('day'); ?>">
							</div>

							<div class="form-group">
								<label>年齢</label>
								<span style="color:red;"><?php echo form_error('age'); ?></span>
								<input class="form-control" type="text" name="age" value="<?php echo set_value('age'); ?>">
							</div>
							<div class="form-group">
								<label>パスワード</label>
								<span style="color:red;"><?php echo form_error('password'); ?></span>
								<input class="form-control" type="password" name="password" value="<?php echo set_value('password'); ?>">
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
								<label>住所</label>
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
								<textarea name="introduction" id="message" cols="30" rows="7" class="form-control" placeholder="トレードを希望する人に向けた軽い自己紹介文を書きましょう。気持ちよく取引を行ってもらうために是非書いておきましょう。"><?php echo set_value('introduction'); ?></textarea>
							</div>
							<div class="form-group">
								<div class="form-group">
								<input type="hidden" name="regist" value="1">
								<input type="submit" class="btn btn-lg btn-success btn-block-conf" value="会員登録する">
								<input type="button" class="btn btn-lg btn-success btn-block-conf" value="修正する" onclick="history.back()">
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</form>
	</div>
</div>