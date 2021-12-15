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
                                    <th>メンバーーID</th>
                                    <th>メンバー名</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($members as $member): ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $member['member_id']; ?></td>
                                        <td><?php echo $member['name']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <a href="<?php echo base_url('admin/members/member_add'); ?>" class="active"><button type="button" class="btn btn-success">追加</button></a>
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