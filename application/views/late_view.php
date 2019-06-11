<html>
<head>
	<title>レート作成表</title>
</head>

<body>
	<h2>レート作成表</h2>
	<p>各メンバーのレートを選んでください</p>
	<form action="http://sattriomph.xsrv.jp/tredia_test/late/late_acceptance" method="post">
	<table border="1">
		<?php foreach($mbs as $mb): ?>
		<tr>
			<td><input type="hidden" name="id[]" value="<?php echo $mb['member_id']; ?>"></td>
			<td><input type="text" name="name[]" value="<?php echo $mb['name']; ?>"></td>
			<td>
				<select name="late_grade[]">
				<option value="1" seledted>SS</option>
				<option value="2">S+</option>
				<option value="3">S</option>
				<option value="4">A+</option>
				<option value="5">A</option>
				<option value="6">B+</option>
				<option value="7">B</option>
				<option value="8">c+</option>
				<option value="9">C</option>
				<option value="10">D+</option>
				<option value="11">D</option>
				<option value="12">E</option>
				</select>
			</td>
		</tr>
		<?php endforeach; ?>
		<tr><td colspan="2"><input type="submit" value="送信する" style="font-size:40px;"></td></tr>
	</table>
	</form>
</body>
</html>