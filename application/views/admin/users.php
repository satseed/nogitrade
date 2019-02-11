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
                                    <th>詳細</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($users as $user): ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $user['user_id']; ?></td>
                                        <td><?php echo $user['nickname']; ?></td>
                                        <td><?php echo $user['email']; ?></td>
                                        <td><a href="<?php echo base_url('admin/users/detail/').$user['user_id']; ?>" class="active"><button type="button" class="btn btn-primary">詳細</button></a></td>
                                    </tr>
                                <? endforeach; ?>
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