    <div id="colorlib-main">
        <div class="colorlib-contact">
            <div class="colorlib-narrow-content">
                <div class="row">
                    <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                        <h2 class="colorlib-heading">
                            <?php if($nickname != $from_name): ?>
                                <?php echo $from_name; ?>さんに返信する。
                            <?php else: ?>
                                <?php echo $seller_nickname; ?>さんに返信する。
                            <?php endif; ?>
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 col-md-push-1" style="left:0;">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
                                <form action="<?php echo base_url('product/reply/').$product_id.'/'.$from_user_id.'/'.$trade_no; ?>" method="post">
                                    <div class="form-group">
                                        <label>ニックネーム</label>
                                        <span style="color:red;"><?php echo form_error('nickname'); ?></span>
                                        <input type="text" class="form-control" name='nickname' value="<?php echo $nickname; ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label>メールアドレス</label>
                                        <span style="color:red;"><?php echo form_error('email'); ?></span>
                                        <input type="text" class="form-control" name='email' value="<?php echo $email; ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label>トレード条件</label>
                                        <span style="color:red;"><?php echo form_error('condition'); ?></span>
                                        <textarea name="condition" id="message" cols="30" rows="7" class="form-control" placeholder="トレードの条件を記入して出品者に伝えてください。"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="trade_no" value="<?php echo $trade_no; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary btn-md" value="メッセージを送る">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ログイン中の名前と出品者の名前が一致しない時に表示を変える -->
    <!--div id="fh5co-main">
        <div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
            <div class="row">
                <div class="col-md-4">
                    <h3 style="margin-bottom:30px; line-height:1.5em;"><?php echo $from_name; ?>さんに返信する。</h3>
                </div>
            </div>
            <form action="<?php echo base_url('product/reply/').$product_id; ?>" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ニックネーム</label>
                                    <span style="color:red;"><?php echo form_error('nickname'); ?></span>
                                    <input type="text" class="form-control" name='nickname' value="<?php echo $nickname; ?>" >
                                </div>

                                <div class="form-group">
                                    <label>メールアドレス</label>
                                    <span style="color:red;"><?php echo form_error('email'); ?></span>
                                    <input type="text" class="form-control" name='email' value="<?php echo $email; ?>" >
                                </div>
                                <div class="form-group">
                                    <label>トレード条件</label>
                                    <span style="color:red;"><?php echo form_error('condition'); ?></span>
                                    <textarea name="condition" id="message" cols="30" rows="7" class="form-control" placeholder="トレードの条件を記入して出品者に伝えてください。"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-md" value="メッセージを送る">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
    </div-->