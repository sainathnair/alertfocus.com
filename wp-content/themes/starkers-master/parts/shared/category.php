<div class="headline-page active">

    <?php
    $current_cat = intval( get_query_var('cat') );
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $argsCategory=array(
        'category__and' => array($current_cat),
        'paged' => $paged,
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'caller_get_posts'=> 1,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $categoryPosts = get_posts( $argsCategory );

    foreach ( $categoryPosts as $post) : setup_postdata($post);
        $category = get_the_category();
        ?>

        <div class="headline headline-asset-item headline-asset-item-card hasimage">
                                                    <span class="parent-label cat-<?php echo $category[0]->slug; ?>">
                                                        <?php echo $category[0]->cat_name; ?>
                                                    </span>
            <a class="anchor headline-grid-load-story" href="<?php the_permalink(); ?>">

                <div class="headline-asset-item-front tile headline-asset-item-news-tile headline-asset-item-tile">
                    <div class="image-wrap">
                        <?php
                        if( has_post_thumbnail() ) { ?>
                            <div class="entry-thumbnail">
                                <?php the_post_thumbnail();?>
                            </div>
                        <?php } else { ?>
                            <img class="post-thumb" src="http://lorempixel.com/200/220" alt=""/>
                        <?php } ?>
                    </div>

                    <h3 class="title image headline-asset-item-front-title">
                        <span class="content-info-icon-text"><?php the_title(); ?></span>
                    </h3>
                </div>

                <div class="headline-asset-item-back tile headline-asset-item-tile headline-asset-item-news-tile">
                    <h3 class="title headline-asset-item-back-title"><?php the_title(); ?></h3>

                    <p class="headline-asset-item-back-text">
                        <?php echo get_the_excerpt(); ?>
                    </p>
                </div>

            </a>
        </div>
    <?php endforeach; wp_reset_postdata() ;?>

</div>