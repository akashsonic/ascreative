<?php
get_header();
?>
    <div id="main">
        <div id="content">
            <!-- Slider start -->
            <div class="slider">
                <div class="slider-box">
                    <div class="slider-hendle">
                        <div class="go-prev" style="padding-top: 15px;"><a class="slider-prev"	style="padding: 10px; background-repeat: no-repeat;" /></a></div>
                        <div class="view-position"><div class="nav-buttons"></div></div>
                        <div class="go-next"><a class="slider-next"	style="padding: 10px; background-repeat: no-repeat;"></a></div>
                    </div>

                    <?php
                    get_template_part("loop","slider");
                    ?>
                </div>
            </div>
            <!-- Slider end -->
            <!-- Home child post start -->
            <div class="slider-new">
                <div class="pages">
                    <ul class="wp-pages">
                        <?php
                        $sub_child_data="";
                        $frontpage_id = get_option('page_on_front');
                        $all_wp_pages =get_parent_page_data($frontpage_id);
                        $datac = 0;
                        $dataactive = "";
                        $alldata = "";
                        for($i=0; $i<count($all_wp_pages); $i++) {
                        	$wp_pages=$all_wp_pages[$i];
                            $all_wp_pages_child = get_parent_page_data($wp_pages->ID);
                            $tcountchild = 0;
                           $tcountchild= count($all_wp_pages_child);
                            
                             
                            $dataparent = $wp_pages->post_parent;
                            if ($tcountchild != 0 && !empty($tcountchild)) {
                               if ($dataparent == $frontpage_id) {
                                    $dataclass = "";
                                    if ($datac == 0) {
                                        $dataactive = $wp_pages->ID;
                                        $dataclass = "page-active";
                                        $datac = 1;
                                    }
                                    $all_wp_pages_sub = get_parent_page_data($wp_pages->ID);
                                    $tcount_sub = 0;
                                    foreach ($all_wp_pages_sub as $wp_pages_sub) {
                                        if ($tcount_sub != 3) {
                                            $tcount_sub++;
                                            $dataparent = $wp_pages->ID;
                                            if ($dataparent != 0) {
                                                $feat_image = wp_get_attachment_url(get_post_thumbnail_id($wp_pages_sub->ID));
                                                $dataclass_sub = "display:none;";
                                                if ($dataactive == $dataparent) {
                                                    $dataclass_sub = "display:block;";
                                                }
                                                if(empty($feat_image)) {
                                                    $feat_image= get_post_content_img($wp_pages_sub->post_content);
                                                }
                                                $excerpt = $wp_pages_sub->post_excerpt;
                                                if(empty($excerpt)){
                                                    $excerpt=wp_strip_all_tags(get_post_limit_content($wp_pages_sub->post_content));
                                                }
                                                $sub_child_data.= '<div class="col-md-4 allchild childpage' . $dataparent . '" style="padding: 15px;' . $dataclass_sub . '  padding-right: 0px;"><img class="child-images" src="' . $feat_image . '" /><p ><a href="'.get_permalink ($wp_pages_sub->ID).'" class="child-page-tile">' . $wp_pages_sub->post_title . '</a></p><p class="child-page-content">' . $excerpt  . '</p></div>';
                                            }
                                        }
                                    }
                                    if ($tcount != 5) {
                                        $tcount++;
                                        echo '<li class="pages-title child-post ' . $dataclass . '" data-id="'.$wp_pages->ID.'"  data-pid="'.$dataclass.'">
' . $wp_pages->post_title . '</li>';
                                    }
                                }
                            }
                        }
                        ?>


                    </ul></div>
                <div class="sub-page">
                    <?php
                    echo $sub_child_data;
                    ?>
                </div>
            </div>
            <!-- Home child post end  -->
        </div>
    </div>
    <!-- widget start -->
    <div id="widget">
        <div class="widgetbox row">
            <div class="col-md-12">
                <?php
                dynamic_sidebar('page-menu');
                ?>
            </div>
        </div>
    </div>
    <!-- widget end -->
<?php
get_footer();