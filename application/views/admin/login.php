<div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">ログインしてください。</h3>
                </div>
                <div class="panel-body">
                    <form method="post" action="<?php echo base_url('admin/login'); ?>">
                        <div class="form-group">
                            <label>ログインID</label>
                            <span style="color:red;"><?php echo form_error('loginid'); ?></span>
                            <input type="text" name="loginid" class="form-control" value="<?php echo set_value('loginid'); ?>">
                        </div>
                        <div class="form-group">
                            <label>ログインパスワード</label>
                            <span style="color:red;"><?php echo form_error('loginpw'); ?></span>
                            <input class="form-control" type="password" name="loginpw" value="<?php echo set_value('loginpw'); ?>">
                        </div>
                        <input type="hidden" name="is_login" value="1">
                        <input type="submit" class="btn btn-lg btn-success btn-block" value="ログインする">
                    </form>
                </div>
            </div>
        </div>
    </div>