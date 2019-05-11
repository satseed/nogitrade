    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ユーザー詳細
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                                <?php foreach($details as $detail): ?>
                                <tr>
                                    <th>出品ID</th>
                                    <td><?php echo $detail['product_id']; ?></td>
                                </tr>
                                <tr>
                                    <th>出品者名</th>
                                    <td><a href="<?php echo base_url('admin/users/detail/').$detail['user_id']; ?>"><?php echo $detail['nickname']; ?></a></td>
                                </tr>
                                <tr>
                                    <th>商品名</th>
                                    <td><?php echo $detail['product_name']; ?></td>
                                </tr>
                                <tr>
                                    <th>商品説明</th>
                                    <td><?php echo $detail['description']; ?></td>
                                </tr>
                                <tr>
                                    <th>トレード条件</th>
                                    <td><?php echo $detail['conditions']; ?></td>
                                </tr>
                                <tr>
                                    <th>商品の保存状態</th>
                                    <td><?php echo $detail['preservation']; ?></td>
                                </tr>
                                <tr>
                                    <th>画像1</th>
                                    <td><img src="<?php echo base_url('images/').$detail['img-1']; ?>" style="width:30%;"></td>
                                </tr>
                                <tr>
                                    <th>画像2</th>
                                    <td><img src="<?php echo base_url('images/').$detail['img-2']; ?>"  style="width:30%;"></td>
                                </tr>
                                <?php if($detail['img-3'] != ''): ?>
                                    <tr>
                                        <th>画像3</th>
                                        <td><img src="<?php echo base_url('images/').$detail['img-3']; ?>" style="width:30%;"></td>
                                    </tr>
                                <?php endif; ?>
                                <?php if($detail['img-4'] != ''): ?>
                                    <tr>
                                        <th>画像4</th>
                                        <td><img src="<?php echo base_url('images/').$detail['img-4']; ?>" style="width:30%;"></td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <th>出品日</th>
                                    <td><?php echo date('Y年n月d日', strtotime($detail['create_data'])); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
</div>
<!-- /#page-wrapper -->