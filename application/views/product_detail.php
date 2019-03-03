    <div id="colorlib-main">
        <div class="colorlib-about">
            <div class="colorlib-narrow-content">
                <div class="row row-bottom-padded-md">
                    <div class="col-md-7">
                        <?php if($pro_detail['img-1'] != NULL): ?>
                            <div class="col-img">
                                <img src="<?php echo base_url('images/'.$pro_detail['img-1']); ?>">
                            </div>
                        <?php endif; ?>
                        <?php if($pro_detail['img-2'] != NULL): ?>
                            <div class="col-img">
                                <img src="<?php echo base_url('images/'.$pro_detail['img-2']); ?>">
                            </div>
                        <?php endif; ?>
                        <?php if($pro_detail['img-3'] != NULL): ?>
                            <div class="col-img">
                                <img src="<?php echo base_url('images/'.$pro_detail['img-3']); ?>">
                            </div>
                        <?php endif; ?>
                        <?php if($pro_detail['img-4'] != NULL): ?>
                            <div class="col-img">
                                <img src="<?php echo base_url('images/'.$pro_detail['img-4']); ?>">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- 商品名と説明 -->
                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                    <div class="about-desc">
                        <h2 class="colorlib-heading"><?php echo $pro_detail['product_name']; ?></h2>
                        <p><?php echo $pro_detail['description']; ?></p>
                    </div>
                </div>

                <!-- トレードのやりとり -->
                <?php if($pro_detail['nickname'] != $nickname): ?>
                    <div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
                        <div class="row">
                            <div class="col-md-10">
                                <?php if($log == 1): ?>
                                    <h2>トレードを希望する</h2>
                                <?php else: ?>
                                    <h3 style="margin-bottom:30px; line-height:1.5em; margin-top:50px;">トレードを希望するには会員登録をしてください。</h3>
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
                                                    <button type="button" class="btn btn-success btn-lg"><a href="<?php echo base_url('registration') ?>" style="color:white;">会員登録する</a></button>
                                                <?php endif ;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                <?php elseif(($pro_detail['nickname'] === $nickname) && ($tr_apps)): ?>
                    <div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
                        <div class="row">
                            <div class="col-md-4" style="width:60%;">
                                <h2>トレード依頼状況</h2>
                            </div>
                        </div>
                        <form action="<?php echo base_url('product/product_detail/').$pro_detail['product_id']; ?>" method="post">
                            <?php foreach($tr_apps as $key => $tr_app): ?>
                                <div class="row" style="margin-left:0;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!--①LINE会話全体を囲う-->
                                                <div class="line-bc">
                                                    <div class="alert alert-info">
                                                        <!--?php foreach($interaction_data as $inter_data): ?-->
                                                            <div class="alert alert-success">
                                                                <p class="alert-link openBtn">
                                                                    <i class="fa fa-chevron-down faColor">&nbsp;<?php echo $tr_app[0]['from_name']; ?>さんからトレードの申し込みがきています。</i>
                                                                    <i class="fa fa-arrow-circle-right">&nbsp;<a href="<?php echo base_url('product/reply/').$tr_app[0]['product_id'].'/'.$tr_app[0]['from_user_id'].'/'.$tr_app[0]['trade_no']; ?>">返信する</a></i>
                                                                </p>
                                                                <?php foreach($tr_app as $ta): ?>
                                                                <div class="accord">
                                                                    <?php if($ta['from_email'] != $nickname): ?>
                                                                        <p class="trade" style="margin-bottom:20px;">
                                                                    <?php else: ?>
                                                                        <p class="accep" style="margin-bottom:20px;">
                                                                    <?php endif; ?>
                                                                        <?php echo nl2br($ta['from_condition']); ?></p>
                                                                </div>
                                                                <?php endforeach; ?>
                                                                <input type="button" class="btn btn-lg btn-block btn-primary" value="取引決定">
                                                                <input type="hidden" name="email" value="<?php echo $tr_app[0]['from_email']; ?>">
                                                            </div>
                                                    <!--?php endforeach; ?-->
                                                </div>
                                                <!--/①LINE会話終了-->
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </form>
                    </div>
                <?php else: ?>
                    <div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
                        <div class="row">
                            <div class="col-md-4" style="width:60%; margin-top: 50px;">
                                <h2>まだトレードの申し込みはありません</h2>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(function(){
  $('.openBtn').click(function(){
    $('.accord').fadeIn();
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