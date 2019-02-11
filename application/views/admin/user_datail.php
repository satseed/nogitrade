	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					ユーザー詳細
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="dataTable_wrapper">
						<table class="table table-striped table-bordered table-hover">
							<tbody>
								<tr>
									<th>ユーザーID</th>
									<td><?php echo $user['user_id']; ?></td>
								</tr>
								<tr>
									<th>氏名</th>
									<td><?php echo $user['name']; ?></td>
								</tr>
								<tr>
									<th>ニックネーム</th>
									<td><?php echo $user['nickname']; ?></td>
								</tr>
								<tr>
									<th>都道府県</th>
									<td><?php echo $user['prefectures']; ?></td>
								</tr>
								<tr>
									<th>メールアドレス</th>
									<td><?php echo $user['email']; ?></td>
								</tr>
								<tr>
									<th>自己紹介</th>
									<td><?php echo $user['introduction']; ?></td>
								</tr>
								<tr>
									<th>登録日</th>
									<td><?php echo $user['create_data']; ?></td>
								</tr>
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

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					出品一覧
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="dataTable_wrapper">
						<table class="table table-striped table-bordered table-hover">
							<tbody>
								<tr>
									<th>出品ID</th>
									<td>商品名</td>
									<td>出品日</td>
									<td>詳細へ</td>
								</tr>
								<?php if(isset($products)): ?>
									<?php foreach($products as $product): ?>
										<tr>
											<th><?php echo $product['product_id']; ?></th>
											<td><?php echo $product['product_name']; ?></td>
											<td><?php echo $product['create_data']; ?></td>
											<td><a href="<?php echo base_url('admin/users/product_detail/').$product['product_id']; ?>" class="active"><button type="button" class="btn btn-primary">詳細</button></a></td>
										</tr>
									<?php endforeach; ?>
								<?php endif; ?>
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