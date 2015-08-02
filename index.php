get_header();
?>
    <div id="main">
        <div id="content">
            <!-- Slider start -->
            <div class="slider">
                <div class="slider-box">
                    <div class="slider-hendle">
                        <div class="go-prev" style="padding-top: 15px;"><a class="slider-prev"	style="padding: 10px; background-repeat: no-repeat;" /></a></div>
                        <div class="view-position"></div>
                        <div class="go-next"><a class="slider-next"	style="padding: 10px; background-repeat: no-repeat;"></a></div>
                    </div>

                    <?php
                    $args = array(
                        'sort_order' => 'ASC',
                        'sort_column' => 'post_title',
                        'hierarchical' => 1,
                        'child_of' => 0,
                        'offset' => 0,
                        'post_type' => 'based_slider',
                        'post_status' => 'publish'
                    );
                    $data= get_pages($args);

                    $recent_posts = wp_get_recent_posts($args);

                    foreach ( $recent_posts as $recent ) {
                        $feat_image = wp_get_attachment_url ( get_post_thumbnail_id ( $recent ["ID"] ) );
                        if(empty($feat_image)) {
                            $feat_image= get_post_content_img($recent ["post_content"]);
                        }
                        if($postid!=6){
                            if(!empty($feat_image)){
                                $postid ++;
                                $excerpt=$recent ["post_excerpt"];
                                if(empty($excerpt)){
                                    $excerpt=$recent ["post_content"];
                                }
                                echo ' <div class="slider-show" style=" width: 95% ;    background-size: 100% 100%;    height: 280px;background-image:url(' . $feat_image . ');"><div class="slider-data slider-data' . $postid .'" data-img="' . $feat_image . '" >                    <p class="post-title">' . $recent ["post_title"] . '</p>                    <p class="post-description">' . $excerpt  . '</p>                </div></div>';
                            }
                        }
                    }

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
                        foreach ($all_wp_pages as $wp_pages) {
                            $all_wp_pages_child = get_parent_page_data($wp_pages->ID);
                            $tcountchild = 0;
                            foreach ($all_wp_pages_child as $wp_pages_child) {
                                $tcountchild++;
                            }
                            $dataparent = $wp_pages->post_parent;
                            if ($tcountchild != 0) {
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
                                                    $excerpt=get_post_limit_content($wp_pages_sub->post_content);
                                                }
                                                $sub_child_data.= '<div class="col-md-4 allchild childpage' . $dataparent . '" style="padding: 15px;' . $dataclass_sub . '  padding-right: 0px;"><img class="child-images" src="' . $feat_image . '" /><p ><a href="" class="child-page-tile">' . $wp_pages_sub->post_title . '</a></p><p class="child-page-content">' . $excerpt  . '</p></div>';
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
?>