<?php

$featured_post_ids = get_theme_mod( 'featured_ids' );
$featured_count = get_theme_mod( 'featured_count', 5 );

if( $featured_post_ids && $featured_post_ids[0]!= '' ) {
	$args = array( 'post_type' => array('post'), 'post__in' => $featured_post_ids, 'showposts' => $featured_count, 'orderby' => 'post__in', 'ignore_sticky_posts' => true );
} else {
	$args = array( 'post_type' => array('post'), 'showposts' => $featured_count, 'ignore_sticky_posts' => true );
}

$featured_query = new WP_Query( $args );

?>

<?php if ( $featured_query->have_posts() ) : ?>
    <div id="wp-bp-posts-slider" class="px-5 feat-slider no-border carousel slide" data-ride="carousel">
        <!--ol class="carousel-indicators">
            <?php $post_counter = 0; ?>
            <?php while ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>
                <li data-target="#wp-bp-posts-slider" data-slide-to="<?php echo esc_attr( $post_counter ); ?>" class="<?php if ( $post_counter === 0 ) : echo "active"; endif; ?>"></li>
                <?php $post_counter++; ?>
            <?php endwhile; ?>
        </ol-->
        <div class="carousel-inner">
            <?php $post_counter = 0; ?>
            <?php while ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>
                <?php
                    $feat_image = get_template_directory_uri() . '/assets/images/default.jpg';
                    $feat_img_alt = '';
                    if( has_post_thumbnail() ) {
                        $get_feat_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                        $feat_image = $get_feat_image[0];
                        $feat_img_alt = get_post_meta( get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true );
                    }
                    if ( $feat_img_alt === '' ) {
                        $feat_img_alt = get_the_title();
                    }
                ?>
                <div class="carousel-item <?php if ( $post_counter === 0 ) : echo "active"; endif; ?>">
                    <div class="row">
                        <div class="col-6  px-rem-2 feat-text col-xs-12">
                            <div class="d-md-flex align-items-center">
                                <div class="w-100 text-left">
                                    <h5 class="pb-4 no-margin"><?php the_title(); ?></h5>
                                    <?php if ( 'post' === get_post_type() ) : ?>
                                        <div class="post-on mb-2">
                                            <?php custom_posted_on(); ?>
                                        </div><!-- .entry-meta -->
                                    <?php endif; ?>
                                    <p><?php echo esc_html( wp_bootstrap_4_get_short_excerpt( 50 ) ); ?></p>
                                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn more-link pl-3 float-right"><?php esc_html_e( 'En savoir plus', 'wp-bootstrap-4' ); ?> <i class="icon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 px-rem-2 feat-image col-xs-12">
                            <img class="d-block w-100" src="<?php echo esc_url( $feat_image ); ?>" alt="<?php echo esc_attr( $feat_img_alt ); ?>">
                        </div>
                    </div>
                </div>
                <?php $post_counter++; ?>
            <?php endwhile; ?>
        </div>
        <a class="carousel-control-prev" href="#wp-bp-posts-slider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only"><?php esc_html_e( 'Previous', 'wp-bootstrap-4' ); ?></span>
        </a>
        <a class="carousel-control-next" href="#wp-bp-posts-slider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only"><?php esc_html_e( 'Next', 'wp-bootstrap-4' ); ?></span>
        </a>
    </div>
<?php endif; ?>
