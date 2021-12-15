    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ユーザー一覧
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ユーザーID</th>
                                    <th>ユーザー名</th>
                                    <th>メールアドレス</th>
                                    <th>状態</th>
                                    <th>詳細</th>
                                    <th>本登録</th>
                                    <th>削除</th>
                                    <th>停止</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($users as $user): ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $user['user_id']; ?></td>
                                        <td><?php echo $user['nickname']; ?></td>
                                        <td><?php echo $user['email']; ?></td>
                                        <td>
                                            <?php if($user['u_flag'] == 0): ?>
                                                仮登録
                                            <?php elseif($user['u_flag'] == 1): ?>
                                                本登録
                                            <?php else: ?>
                                                停止中
                                            <?php endif; ?>
                                        </td>
                                        <td><a href="<?php echo base_url('admin/users/detail/').$user['user_id']; ?>" class="active"><button type="button" class="btn btn-primary">詳細</button></a></td>
                                        <td><a href="<?php echo base_url('admin/users/official_registration/').$user['user_id']; ?>" class="active"><button type="button" class="btn btn-info">本登録</button></a></td>
                                        <td><a href="<?php echo base_url('admin/users/delete_user/').$user['user_id']; ?>" class="active"><button type="button" class="btn btn-danger">削除</button></a></td>
                                        <td><a href="<?php echo base_url('admin/users/stop_user/').$user['user_id']; ?>" class="active"><button type="button" class="btn btn-warning">停止</button></a></td>
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