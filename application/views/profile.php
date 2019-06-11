<div id="colorlib-main">
    <div class="colorlib-contact">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                    <h2 class="colorlib-heading heading">プロフィール</h2>
                </div>
            </div>
            <form method="post" action="<?php echo base_url('mypage/profile/').$profile[0]['access_id']; ?>">
                <div class="row">
                    <div class="col-md-7 col-md-push-1" style="left:0;">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
                                <?php foreach($profile as $prof): ?>
                                    <div class="form-group">
                                        <label>名前</label>
                                        <span style="color:red;"><?php echo form_error('name'); ?></span>
                                        <input type="text" name="name" class="form-control" value="<?php echo $prof['name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>ニックネーム</label>
                                        <span style="color:red;"><?php echo form_error('nickname'); ?></span>
                                        <input class="form-control" type="text" name="nickname" value="<?php echo $prof['nickname']; ?>">
                                    </div>
                                    <div class="form-group" style="width:20%; display:inline-block; margin-right:15px;">
                                        <label>年</label>
                                        <select class="form-control" name="year">
                                            <option value="">--</option>
                                            <?php for($y=1920; $y<=date('Y'); $y++): ?>
                                                <?php if($y==$prof['year']): ?>
                                                    <option value="<?php echo $y; ?>" selected><?php echo $y; ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                                                <?php endif; ?>
                                            <?php endfor;?>
                                        </select>
                                    </div>
                                    <div class="form-group" style="width:20%; display:inline-block; margin-right:15px;">
                                        <label>月</label>
                                        <select class="form-control" name="month"; ?>">
                                            <option value="">--</option>
                                            <?php for($m=1; $m<=12; $m++): ?>
                                                <?php if($m==$prof['month']): ?>
                                                    <option value="<?php echo $m; ?>" selected><?php echo $m; ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo $m; ?>"><?php echo $m; ?></option>
                                                <?php endif; ?>
                                            <?php endfor;?>
                                        </select>
                                    </div>
                                    <div class="form-group" style="width:20%; display:inline-block; margin-right:15px;">
                                        <label>日</label>
                                        <select class="form-control" name="day">
                                            <option value="">--</option>
                                            <?php for($d=1; $d<=31; $d++): ?>
                                                <?php if($d==$prof['day']): ?>
                                                    <option value="<?php echo $d; ?>" selected><?php echo $d; ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo $d; ?>"><?php echo $d; ?></option>
                                                <?php endif; ?>
                                            <?php endfor;?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>郵便番号（ハイフン不要）</label>
                                        <span style="color:red;"><?php echo form_error('postal'); ?></span>
                                        <input class="form-control" type="text" name="postal" size="10" maxlength="7" onKeyUp="AjaxZip3.zip2addr(this,'','prefectures','address');" value="<?php echo $prof['postal']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>都道府県</label>
                                        <span style="color:red;"><?php echo form_error('prefectures'); ?></span>
                                        <input class="form-control" type="text" name="prefectures" value="<?php echo $prof['prefectures']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>住所</label>
                                        <span style="color:red;"><?php echo form_error('address'); ?></span>
                                        <input class="form-control" type="text" name="address" value="<?php echo $prof['address']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>自己紹介</label>
                                        <textarea name="introduction" id="message" cols="30" rows="7" class="form-control"><?php echo $prof[
                                        'introduction']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-lg btn-block btn-primary" value="プロフィールを修正する">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>