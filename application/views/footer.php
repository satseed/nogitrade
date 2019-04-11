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

		//tabの作成
		$(function(){
		    $('.tabcontent > div').hide();
		 
		    $('.tabnav a').click(function () {
		        $('.tabcontent > div').hide().filter(this.hash).fadeIn();
		 
		        $('.tabnav a').removeClass('active');
		        $(this).addClass('active');
		 
		        return false;
		    }).filter(':eq(0)').click();
		});

		$(function(){
			$('.alert-success').click(function(){
				var $trade_exchange = $(this).find('.exchange');
					if($trade_exchange.hasClass('open')){
						$trade_exchange.removeClass('open');
						$trade_exchange.slideUp(5000);
					}else{
						$trade_exchange.addClass('open');
						$trade_exchange.slideDown('slow');
					}
			});
		});

	</script>

	</body>
</html>