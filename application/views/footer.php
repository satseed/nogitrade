<!-- jQuery -->
	<script src="<?php echo base_url('js/') ?>jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="<?php echo base_url('js/') ?>jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url('js/') ?>bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="<?php echo base_url('js/') ?>jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="<?php echo base_url('js/') ?>jquery.flexslider-min.js"></script>
	<!-- Sticky Kit -->
	<script src="<?php echo base_url('js/') ?>sticky-kit.min.js"></script>
	<!-- Owl carousel -->
	<script src="<?php echo base_url('js/') ?>owl.carousel.min.js"></script>
	<!-- Counters -->
	<script src="<?php echo base_url('js/') ?>jquery.countTo.js"></script>
	
	
	<!-- MAIN JS -->
	<script src="<?php echo base_url('js/') ?>main.js"></script>

	<script src="<?php echo base_url('css/slick/') ?>slick.min.js"></script>

	<script type="text/javascript">
		$(function() {
		    $('.col-md-7').slick();
		});

		$(function() {
 
		  // ①タブをクリックしたら発動
		  $('.tab li').click(function() {
		 
		    // ②クリックされたタブの順番を変数に格納
		    var index = $('.tab li').index(this);
		 
		    // ③クリック済みタブのデザインを設定したcssのクラスを一旦削除
		    $('.tab li').removeClass('active');
		 
		    // ④クリックされたタブにクリック済みデザインを適用する
		    $(this).addClass('active');
		 
		    // ⑤コンテンツを一旦非表示にし、クリックされた順番のコンテンツのみを表示
		    $('.area ul').removeClass('show').eq(index).addClass('show');
		 
		  });
		});
	</script>

	</body>
</html>