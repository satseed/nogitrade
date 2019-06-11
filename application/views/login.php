<div id="colorlib-main">
    <div class="colorlib-contact">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                    <h2 class="colorlib-heading">ログイン</h2>
                    <?php if(isset($error)): ?>
                        <span style="color:red;"><?php echo $error; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 col-md-push-1" style="left:0;">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
                            <form action="<?php echo base_url('login'); ?>" method="post">
                                <div class="form-group">
                                    <span style="color:red;"><?php echo form_error('email'); ?></span>
                                    <input class="form-control" placeholder="メールアドレス" name="email" type="email" value="<?php echo set_value('email'); ?>" autofocus>
                                </div>
                                <div class="form-group">
                                    <span style="color:red;"><?php echo form_error('password'); ?></span>
                                    <input class="form-control" placeholder="パスワード" name="password" type="password" value="<?php echo set_value('password'); ?>">
                                </div>
                                <div class="form-group">
                                    <a href="<?php echo base_url('forget_password'); ?>"><h5 style="text-align:center;">パスワードを忘れた方はこちら</h5></a>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-lg btn-block btn-primary" value="ログインする">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>