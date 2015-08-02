<!-- Footer start -->
<div id="footer">
<!-- Footer logo start -->
<div class="footer-logo"><a href="<?php echo get_site_url();?>"><img src="<?php echo get_custom_data('upload_Footer_logo');?>" /></a></div>
<!-- Footer logo end -->
<!-- Footer menu start -->
<div class="menu-nav-footer">
<?php
get_menu('footermenu','cssmenufooter','social');
?>
<!-- Footer menu and -->
<!-- Footer text start -->
<p class="copyright"> <?php echo get_custom_data('as_footer_area_text');?></p>
<!-- Footer text end -->
</div>
</div>
<!-- Footer end -->
</div>
<script src="<?php echo get_template_directory_uri(); ?>/lib/js/as-custom-script.js" type="text/javascript" ></script>
<script src="<?php echo get_template_directory_uri();?>/lib/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/lib/js/jquery.cycle.all.js"></script>
<script type="text/javascript">
$(function() {
    $('.slider-box').cycle({
        fx:     'turnDown',
        speed:  'fast',
        timeout: 3000,
        pager:  '.view-position',
		slideExpr: '.slider-show',
	    prev:   '.slider-prev', 
	    next:   '.slider-next', 
    });
});
</script>
</body>
</html>