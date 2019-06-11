<!--h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">出品リスト一覧</h2>-->
<div id="colorlib-main">
    <div class="colorlib-services">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                    <h2 class="colorlib-heading heading">出品商品一覧</h2>
                </div>
            </div>

            <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                <div id="tab01">
                    <div class="row" style="float:left; width:500px; margin-right: -200px;">
                        <table id="list">
                            <tr>
                                <th>商品ID</th>
                                <th>商品名</th>
                                <th>取引状況</th>
                                <th>出品日</th>
                            </tr>
                            <?php foreach($all_lists as $al_list): ?>
                            <tr>
                                <td><a href="<?php echo base_url('product/product_detail/').$al_list['product_id']; ?>"><?php echo $al_list['product_id']; ?></a></td>
                                <td><a href="<?php echo base_url('product/product_detail/').$al_list['product_id']; ?>"><?php echo $al_list['product_name']; ?></a></td>
                                <td>
                                    <?php if($al_list['flag'] == 1): ?>
                                        <span style="color:red; font-weight:bold;">取引中</span>
                                    <?php else: ?>
                                        未取引
                                    <?php endif; ?> 
                                </td>
                                <td><?php echo date('Y/m/d', strtotime($al_list['create_data'])); ?></td>
                            </tr>
                            <?php endforeach; ?> 
                            <tr>
                                <td colspan="4"><span class="page"><?php echo $this->pagination->create_links(); ?></span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>