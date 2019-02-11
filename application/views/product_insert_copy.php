<div id="fh5co-main">
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
								<label>カテゴリー</label>
								<select name="lv1" id="lv1Pulldown" class="form-control">
									<option value="0" selected="selected">▼選択</option>
									<?php foreach($fst_category as $fcate): ?>
										<option value="<?php echo $fcate['category_id']; ?>" ><?php echo $fcate['category_name']; ?></option>
									<?php endforeach; ?>
								</select>
								<select name="lv2" id="lv2Pulldown" disabled="disabled" class="form-control">
									<option value="0">▼選択</option>
									<?php foreach($snd_category as $scate): ?>
										<option value="<?php echo $scate['sec_category_id']; ?>" class="<?php echo "p".$scate['category_id']; ?>" ><?php echo $scate['sec_category_name']; ?></option>
									<?php endforeach; ?>
								</select>
								<select name="lv3" id="lv3Pulldown" disabled="disabled" class="form-control">
									<option value="0">▼選択</option>
									<?php foreach($snd_category as $scate): ?>
										<?php foreach($trd_category as $tcate): ?>
											<?if ($scate['category_id'] == $tcate['category_id']): ?>
												<option value="<?php echo $tcate['thi_category_id']; ?>" class="<?php echo "p".$scate['sec_category_id']; ?>"><?php echo $tcate['thi_category_name']; ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									<?php endforeach; ?>
								</select>
								<select name="lv2" id="lv4Pulldown" disabled="disabled" class="form-control">
									<option value="0">▼選択</option>
									<?php foreach($member as $mem): ?>
										<option value="<?php echo $scate['sec_category_id']; ?>" class="<?php echo "p".$scate['category_id']; ?>" ><?php echo $mem['name']; ?></option>
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
</div>


<script type="text/javascript">
$(document).ready(function(){
 
    // プルダウンのoption内容をコピー
    var pd2 = $("#lv2Pulldown option").clone();
    var pd3 = $("#lv3Pulldown option").clone();
 
    // 1→2連動
    $("#lv1Pulldown").change(function () {
        // lv1のvalue取得
        var lv1Val = $("#lv1Pulldown").val();
 
        // lv2Pulldownのdisabled解除
        $("#lv2Pulldown").removeAttr("disabled");
 
        // 一旦、lv2Pulldownのoptionを削除
        $("#lv2Pulldown option").remove();
 
        // (コピーしていた)元のlv2Pulldownを表示
        $(pd2).appendTo("#lv2Pulldown");
 
        // 選択値以外のクラスのoptionを削除
        $("#lv2Pulldown option[class != p"+lv1Val+"]").remove();
 
        // 「▼選択」optionを先頭に表示
        $("#lv2Pulldown").prepend('<option value="0" selected="selected">▼選択</option>');
 
        // lv3Pulldown disabled処理
        $("#lv3Pulldown").attr("disabled", "disabled");
        $("#lv3Pulldown option").remove();
        $("#lv3Pulldown").prepend('<option value="0" selected="selected">▼選択</option>');
    });

    // 2→3連動
    $("#lv2Pulldown").change(function () {
        // lv2のvalue取得
        var lv2Val = $("#lv2Pulldown").val();
 
        // lv3Pulldownのdisabled解除
        $("#lv3Pulldown").removeAttr("disabled");
 
        // 一旦、lv3Pulldownのoptionを削除
        $("#lv3Pulldown option").remove();
 
        // (コピーしていた)元のlv3Pulldownを表示
        $(pd3).appendTo("#lv3Pulldown");
 
        // 選択値以外のクラスのoptionを削除
        $("#lv3Pulldown option[class != p"+lv2Val+"]").remove();
 
        // 「▼選択」optionを先頭に表示
        $("#lv3Pulldown").prepend('<option value="0" selected="selected">▼選択</option>');
    });
});
</script>