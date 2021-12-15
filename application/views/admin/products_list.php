    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    商品一覧
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>商品ID</th>
                                    <th>ユーザーID</th>
                                    <th>商品名</th>
                                    <th>状態</th>
                                    <th>詳細</th>
                                    <th>出品日</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($products as $product): ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $product['product_id']; ?></td>
                                        <td><?php echo $product['user_id']; ?></td>
                                        <td><?php echo $product['product_name']; ?></td>
                                        <td>
                                            <?php if($product['flag'] == 0): ?>
                                                未取引
                                            <?php elseif($product['flag'] == 1): ?>
                                                <span style="color: red; font-weight: bold;">取引中</span>
                                            <?php else: ?>
                                                <span style="color: blue; font-weight: bold;">取引終了</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><a href="<?php echo base_url('admin/products/detail/').$product['product_id']; ?>" class="active"><button type="button" class="btn btn-primary">詳細</button></a></td>
                                        <td><?php echo date("Y/m/d H:i:s", strtotime($product['create_data'])); ?></td>
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
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->