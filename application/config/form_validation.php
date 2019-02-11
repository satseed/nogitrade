<?php
//ログインバリデーション
$config = array(
	//ログイン画面
	'adlogin' => array(
		array(
			'field' => 'loginid',
			'label' => 'ログインID',
			'rules' => 'required'
		),
		array(
			'field' => 'loginpw',
			'label' => 'ログインパスワード',
			'rules' => 'required'
		),
	),
	//会員登録
	'member' => array(
		array(
			'field' => 'name',
			'label' => '名前',
			'rules' => 'required'
		),
		array(
			'field' => 'phonetic',
			'label' => 'ふりがな',
			'rules' => 'required'
		),
		array(
			'field' => 'nickname',
			'label' => 'ニックネーム',
			'rules' => 'required|callback__check_nickname'
		),
		array(
			'field' => 'year',
			'label' => '年',
			'rules' => 'required'
		),
		array(
			'field' => 'month',
			'label' => '月',
			'rules' => 'required'
		),
		array(
			'field' => 'day',
			'label' => '日',
			'rules' => 'required'
		),
		array(
			'field' => 'password',
			'label' => 'パスワード',
			'rules' => 'required|alpha_numeric|min_length[6]|max_length[12]'
		),
		array(
			'field' => 'postal',
			'label' => '郵便番号',
			'rules' => 'required|numeric'
		),
		array(
			'field' => 'prefectures',
			'label' => '都道府県',
			'rules' => 'required'
		),
		array(
			'field' => 'address',
			'label' => '住所',
			'rules' => 'required'
		),
		array(
			'field' => 'email',
			'label' => 'メールアドレス',
			'rules' => 'required|callback__check_overlap_email'
		),
	),
	//商品登録
	'product' => array(
		array(
			'field' => 'product_name',
			'label' => '商品名',
			'rules' => 'required'
		),
		array(
			'field' => 'description',
			'label' => '商品詳細',
			'rules' => 'required'
		),
		array(
			'field' => 'preservation',
			'label' => '商品の保存状態',
			'rules' => 'required'
		),
	),
	//ユーザーログイン
	'uslogin' => array(
		array(
			'field' => 'email',
			'label' => 'メールアドレス',
			'rules' => 'required'
		),
		array(
			'field' => 'password',
			'label' => 'パスワード',
			'rules' => 'required'
		),
	),
	//トレード条件
	'trade' => array(
		array(
			'field' => 'nickname',
			'label' => 'ニックネーム',
			'rules' => 'required'
		),
		array(
			'field' => 'email',
			'label' => 'メールアドレス',
			'rules' => 'required'
		),
		array(
			'field' => 'condition',
			'label' => 'トレード条件',
			'rules' => 'required'
		),
	),
	//メルアド・パスワード変更
	'email_pass' => array(
		array(
			'field' => 'email',
			'label' => 'メールアドレス',
			'rules' => 'required'
		),
		array(
			'field' => 'current_password',
			'label' => '現在のパスワード',
			'rules' => 'required|max_length[12]|callback__password_check'
		),
		array(
			'field' => 'password',
			'label' => '新しいパスワード',
			'rules' => 'required|max_length[12]'
		),
		array(
			'field' => 'password_confirmation',
			'label' => '新しいパスワード確認用',
			'rules' => 'required|max_length[12]|callback__check_password_confirmation'
		),
	),
	//パスワード再設定
	'forget_pass_rest' => array(
		array(
			'field' => 'restemail',
			'label' => 'メールアドレス',
			'rules' => 'required|callback__check_email'
		),
		array(
			'field' => 'restpassword',
			'label' => 'パスワード',
			'rules' => 'required'
		),
		array(
			'field' => 'password_confirmation',
			'label' => '新しいパスワード（確認用）',
			'rules' => 'required|callback__check_password_confirmation'
		),
	),
)
?>