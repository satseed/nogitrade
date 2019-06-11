    <div id="colorlib-main">
        <div class="colorlib-about">
            <div class="colorlib-narrow-content">
                <!--div class="row row-bottom-padded-md">
                    <div class="col-md-7">
                        <div class="col-img">
                            <?php if(file_exists($pro_detail['img-1'])): ?>
                                <img src="<?php echo base_url().$pro_detail['img-1']; ?>">
                            <?php else: ?>
                                <img src="<?php echo base_url('images/no-img.jpg'); ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div-->

                <!-- 商品名と説明 -->
                <div class="fh5co-narrow-content animate-box heading" data-animate-effect="fadeInLeft">
                    <div class="row" style="padding: 20px;">
                        <table id="prodetail">
                            <tr><td colspan="2" style="background-color:#7e0f85; font-weight:bold; color:white; font-size:40px;">商品詳細</td></tr>
                            <tr><th>商品名</th><td><?php echo $pro_detail['product_name']; ?></td></tr>
                            <tr><th>出品者名</th><td><?php echo $pro_detail['nickname']; ?>さん</td></tr>
                            <tr><th>商品説明</th><td><?php echo nl2br($pro_detail['description']); ?></td></tr>
                            <tr><th>トレード条件</th><td><?php echo $pro_detail['conditions']; ?></td></tr>
                            <tr><th>保存状態</th><td><?php echo nl2br($pro_detail['preservation']); ?></td></tr>
                            <tr><th>出品日</th><td><?php echo $pro_detail['create_data']; ?></td></tr>
                            <tr><th>商品画像</th><td><img src="<?php echo base_url($pro_detail['img-1']); ?>"></td></tr>
                        </table>
                    </div>
                </div>

                <!-- トレードのやりとり -->
                    <!-- 出品者側の表示 -->
                    <?php if($nickname === $pro_detail['nickname'] && !empty($tr_apps)): ?>
                        <div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
                            <div class="row">
                                <div class="col-md-4" style="width:60%;">
                                    <h2 class="colorlib-heading">トレード依頼状況</h2>
                                </div>
                            </div>
                            <?php foreach($tr_apps as $key => $tr_app): ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="line-bc">
                                                    <div class="alert alert-info">
                                                        <div class="alert alert-success">
                                                            <p class="yaritori alert-link openBtn">
                                                                <i class="fa fa-chevron-down faColor">&nbsp;<?php echo $tr_app[0]['from_name']; ?>さんからトレードの申し込みがきています。</i>
                                                                <i class="fa fa-arrow-circle-right">&nbsp;<a href="<?php echo base_url('product/reply/').$tr_app[0]['product_id'].'/'.$tr_app[0]['from_user_id'].'/'.$tr_app[0]['trade_no']; ?>">返信する</a></i>
                                                            </p>
                                                            <!-- トレードのやりとり -->
                                                            <div class="exchange">
                                                                <?php foreach($tr_app as $ta): ?>
                                                                    <div class="accord">
                                                                        <?php if($ta['from_name'] != $nickname): ?>
                                                                            <p class="trade" style="margin-bottom:20px;">
                                                                        <?php else: ?>
                                                                            <p class="accep" style="margin-bottom:20px;">
                                                                        <?php endif; ?>
                                                                            <?php echo nl2br($ta['from_condition']); ?></p>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                                <form action="<?php echo base_url("product/transaction_decision/").$tr_app[0]['product_id']."/".$tr_app[0]['trade_no']; ?>" method="post">
                                                                    <button type="submit" name="delivery" class="btn btn-lg btn-block btn-primary" value="1" onClick="return confirm('<?php echo $tr_app[0]['from_name']; ?>さんと配送で取引決定でいいですか？');">配送取引希望</button>
                                                                    <button type="submit" name="local" class="btn btn-lg btn-block btn-primary" value="2" onClick="return confirm('<?php echo $tr_app[0]['from_name']; ?>さんと現地取引決定でいいですか？');">現地取引希望</button>
                                                                    <input type="hidden" name="product_id" value="<?php echo $tr_app[0]['product_id']; ?>">
                                                                    <input type="hidden" name="to_email" value="<?php echo $tr_app[0]['from_email']; ?>">
                                                                    <input type="hidden" name="from_email" value="<?php echo $email; ?>">
                                                                </form>
                                                            </div>
                                                            <!-- トレードのやりとり -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php elseif($nickname === $pro_detail['nickname'] && empty($tr_apps)): ?>
                        <div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
                            <div class="row">
                                <div class="col-md-4">
                                    <h3>トレードやりとり状況</h3>
                                    <p class="trade_status">まだトレードの申し込みはありません</p>
                                </div>
                            </div>
                        </div>
                    <!-- 出品者側の表示 -->

                    <!-- 希望者側の表示 -->
                    <?php elseif($pro_detail['nickname'] != $nickname && !empty($wish_tr_apps)): ?>
                        <div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
                            <div class="row">
                                <div class="col-md-4" style="width:60%;">
                                    <h2>トレードやりとり状況</h2>
                                </div>
                            </div>
                            <?php foreach($wish_tr_apps as $key => $wi_tr_app): ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="line-bc">
                                                    <div class="alert alert-info">
                                                        <div class="alert alert-success">
                                                            <p class="alert-link openBtn">
                                                                <?php if(count($wi_tr_app) <= 1): ?>
                                                                <i class="fa fa-chevron-down faColor">&nbsp;<?php echo $pro_detail['nickname']; ?>さんに申し込み済みです。</i>
                                                                <?php else: ?>
                                                                <i class="fa fa-chevron-down faColor">&nbsp;<?php echo $pro_detail['nickname']; ?>さんから返信がきています。</i>
                                                                <?php endif; ?>
                                                                <i class="fa fa-arrow-circle-right">&nbsp;<a href="<?php echo base_url('product/reply/').$wi_tr_app[0]['product_id'].'/'.$wi_tr_app[0]['from_user_id'].'/'.$wi_tr_app[0]['trade_no']; ?>">返信する</a></i>
                                                            </p>
                                                            <div class="exchange">
                                                                <?php foreach($wi_tr_app as $wta): ?>
                                                                    <div class="accord">
                                                                        <?php if($wta['from_name'] != $nickname): ?>
                                                                            <p class="trade" style="margin-bottom:20px;">
                                                                        <?php else: ?>
                                                                            <p class="accep" style="margin-bottom:20px;">
                                                                        <?php endif; ?>
                                                                            <?php echo nl2br($wta['from_condition']); ?></p>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <!-- 希望者側の表示 -->
                    <?php else: ?>
                        <div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
                            <div class="row">
                                <div class="col-md-10">
                                    <?php if($log == 1): ?>
                                        <h2>トレードを希望する</h2>
                                    <?php else: ?>
                                        <h3 style="margin-bottom:30px; line-height:1.5em; margin-top:50px;">トレードを希望するにはログインか会員登録をしてください。</h3>
                                    <?php endif ;?>
                                </div>
                            </div>
                            <form action="<?php echo base_url('product/product_detail/').$pro_detail['product_id']; ?>" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?php if($log == 1): ?>
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
                                                <?php endif; ?>
                                                <div class="form-group">
                                                    <?php if($log == 1): ?>
                                                        <input type="hidden" name="product_id" value="<?php echo $pro_detail['product_id']; ?>">
                                                        <input type="submit" class="btn btn-primary btn-md" value="メッセージを送る">
                                                    <?php else: ?>
                                                        <button type="button" class="btn btn-primary btn-lg"><a href="<?php echo base_url('login') ?>" style="color:white;">ログインする</a></button>
                                                        <button type="button" class="btn btn-primary btn-lg"><a href="<?php echo base_url('registration') ?>" style="color:white;">会員登録する</a></button>
                                                    <?php endif ;?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    <?php endif; ?>
                <!-- トレードのやりとり -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(function(){
  $('.openBtn').click(function(){
    $('.line-bc').fadeIn();
    );
  });

  /*
  $(function(){
  $(".openBtn").click(function(){
    $($(this).next(".trade")).animate(
      {height: "toggle", opacity: "toggle"},

      1000
    );
  });
    */

  $('.slider').each(function(){
        $(this).slick({
            autoplay:true,
            autoplaySpeed:5000,
            dots:true,
        });
    }); 
});
</script>
<!-- <a href="<?php echo base_url('product/reply/').$ta['product_id']; ?>"><button>返信する</button></a> -->