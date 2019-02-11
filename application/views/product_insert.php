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
							<form method="post" action="<?php echo base_url('product'); ?>" enctype="multipart/form-data">
								<div class="form-group">
									<label>グループ名</label>
									<input type="text" name="group_name" class="form-control" value="乃木坂46">
								</div>
								<div class="form-group">
									<label>メンバー名</label>
									<select name="member_name" class="form-control">
									<option value="0" selected="selected">▼選択</option>
									<?php foreach($member as $meb): ?>
										<option value="<?php echo $meb['member_id']; ?>" ><?php echo $meb['name']; ?></option>
									<?php endforeach; ?>
								</select>
								</div>
								<div class="form-group">
									<label>商品名</label>
									<span style="color:red;"><?php echo form_error('product_name'); ?></span>
									<input type="text" name="product_name" class="form-control" value="<?php echo set_value('product_name'); ?>">
								</div>
								<div class="form-group">
									<label>商品詳細</label>
									<span style="color:red;"><?php echo form_error('description'); ?></span>
									<textarea row="4" cols="40" class="form-control" name="description" value="<?php echo set_value('description'); ?>" placeholder="ここに商品の詳細情報を記入してください。"></textarea>
								</div>
								<div class="form-group">
									<label>商品画像</label>
									<br />
									<span style="color:red;"><strong>商品の写真は最低2枚は登録してください。</strong></span>
									<span style="color:red;"><?php echo form_error('img-1'); ?></span>
									<input class="form-control" type="file" name="userfile[]" value="<?php echo set_value('img-1'); ?>">
								</div>
								<div class="form-group">
									<span style="color:red;"><?php echo form_error('img-2'); ?></span>
									<input class="form-control" type="file" name="userfile[]" value="<?php echo set_value('img-2'); ?>">
								</div>
								<div class="form-group">
									<span style="color:red;"><?php echo form_error('img-3'); ?></span>
									<input class="form-control" type="file" name="userfile[]" value="<?php echo set_value('img-3'); ?>">
								</div>
								<div class="form-group">
									<span style="color:red;"><?php echo form_error('img-4'); ?></span>
									<input class="form-control" type="file" name="userfile[]" value="<?php echo set_value('img-4'); ?>">
								</div>
								<div class="form-group">
									<label>希望するトレード条件（任意）</label>
									<span style="color:red;"><?php echo form_error('conditions'); ?></span>
									<textarea  row="4" cols="40" class="form-control" name="conditions" value="<?php echo set_value('conditions'); ?>" placeholder="希望があればトレード条件を記入してください。"></textarea>
								</div>
								<div class="form-group">
									<label>商品の保存状態</label>
									<span style="color:red;"><?php echo form_error('preservation'); ?></span>
									<textarea class="form-control" name="preservation" value="<?php echo set_value('preservation'); ?>" placeholder="商品の保存状態を出来るだけ詳しく記入してください。"></textarea>
								</div>

								<div class="form-group">
									<input type="submit" class="btn btn-lg btn-primary btn-block" value="商品を登録する">
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
				<h2>商品を登録して下さい。</h2>
			</div>
		</div>
		<form method="post" action="<?php echo base_url('product'); ?>" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group" style="width:20%; display:inline-block; margin-right:15px;">
								<label>グループ名</label>
								<input type="text" name="group_name" class="form-control" value="乃木坂46">
							</div>
							<div class="form-group">
								<label>メンバー名</label>
								<select name="member_name" class="form-control">
									<option value="0" selected="selected">▼選択</option>
									<?php foreach($member as $meb): ?>
										<option value="<?php echo $meb['member_id']; ?>" ><?php echo $meb['name']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label>商品名</label>
								<span style="color:red;"><?php echo form_error('product_name'); ?></span>
								<input type="text" name="product_name" class="form-control" value="<?php echo set_value('product_name'); ?>">
							</div>
							<div class="form-group">
								<label>商品詳細</label>
								<span style="color:red;"><?php echo form_error('description'); ?></span>
								<textarea row="4" cols="40" class="form-control" name="description" value="<?php echo set_value('description'); ?>" placeholder="ここに商品の詳細情報を記入してください。"></textarea>
							</div>
							<div class="form-group">
								<label>商品画像</label>
								<br />
								<span style="color:red;"><strong>商品の写真は最低2枚は登録してください。</strong></span>
								<span style="color:red;"><?php echo form_error('img-1'); ?></span>
								<input class="form-control" type="file" name="userfile[]" value="<?php echo set_value('img-1'); ?>">
							</div>
							<div class="form-group">
								<span style="color:red;"><?php echo form_error('img-2'); ?></span>
								<input class="form-control" type="file" name="userfile[]" value="<?php echo set_value('img-2'); ?>">
							</div>
							<div class="form-group">
								<span style="color:red;"><?php echo form_error('img-3'); ?></span>
								<input class="form-control" type="file" name="userfile[]" value="<?php echo set_value('img-3'); ?>">
							</div>
							<div class="form-group">
								<span style="color:red;"><?php echo form_error('img-4'); ?></span>
								<input class="form-control" type="file" name="userfile[]" value="<?php echo set_value('img-4'); ?>">
							</div>
							<div class="form-group">
								<label>希望するトレード条件（任意）</label>
								<span style="color:red;"><?php echo form_error('conditions'); ?></span>
								<textarea  row="4" cols="40" class="form-control" name="conditions" value="<?php echo set_value('conditions'); ?>" placeholder="希望があればトレード条件を記入してください。"></textarea>
							</div>
							<div class="form-group">
								<label>商品の保存状態</label>
								<span style="color:red;"><?php echo form_error('preservation'); ?></span>
								<textarea class="form-control" name="preservation" value="<?php echo set_value('preservation'); ?>" placeholder="商品の保存状態を出来るだけ詳しく記入してください。"></textarea>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-lg btn-success btn-block" value="商品を登録する">
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</form>
	</div>
</div-->