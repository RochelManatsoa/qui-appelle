<?php
/**
 * Qui appelle functions and definitions
 *
 * */

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

/**
 * Disable Gutenberg editor
 */
/*add_filter( 'use_block_editor_for_post', '__return_false' );*/

/**
 * Enqueue scripts and styles.
 */
function qui_appelle_scripts() {
    wp_enqueue_style( 'fonts-style', get_theme_file_uri('/css/fonts.css'), array(), false, 'all' );

    wp_enqueue_script( 'dialog-polyfill', get_theme_file_uri( '/js/dialog-polyfill.js' ), array( 'jquery' ), false, true );
    wp_enqueue_script( 'mansory_pkgd-js', get_theme_file_uri( '/js/masonry.pkgd.min.js' ), array( 'jquery' ), false, true );

    wp_enqueue_script( 'enc-base64-js', get_theme_file_uri( '/js/crypto-js.js' ), array( 'jquery' ), false, true );
    wp_enqueue_script( 'enc-base64-js', get_theme_file_uri( '/js/enc-base64.js' ), array( 'jquery' ), false, true );
    wp_enqueue_script( 'hmac-sha256-js', get_theme_file_uri( '/js/hmac-sha256.js' ), array( 'jquery' ), false, true );
    wp_enqueue_script( 'php-js', get_theme_file_uri( '/js/php.js' ), array( 'jquery' ), false, true );
    wp_enqueue_script( 'nuarysh-js', get_theme_file_uri( '/js/nuarysh.js' ), array( 'jquery' ), false, true );

    wp_enqueue_script( 'custom-js', get_theme_file_uri( '/js/custom.js' ), array( 'jquery' ), false, true );
}
add_action( 'wp_enqueue_scripts', 'qui_appelle_scripts' );


if ( ! function_exists( 'custom_posted_on' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function custom_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( 'c' ) ),
            esc_html( get_the_modified_date() )
        );

        $posted_on = sprintf(
        /* translators: %s: post date. */
            esc_html_x( 'Posté le %s', 'post date', 'qui-appelle' ),
            '<span class="post-date">'. $time_string . '</span>'
        );

        $byline = sprintf(
        /* translators: %s: post author. */
            esc_html_x( 'par %s', 'post author', 'qui-appelle' ),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span>'. ' ' . __('dans') . ' ';
        echo the_category(',');

    }
endif;

if ( ! function_exists( 'custom_posted_on_short' ) ) :
    function custom_posted_on_short() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( 'c' ) ),
            esc_html( get_the_modified_date() )
        );

        $posted_on = sprintf(
        /* translators: %s: post date. */
            esc_html_x( 'Posté le %s', 'post date', 'qui-appelle' ),
            '<span class="post-date">'. $time_string . '</span>'
        );

        $byline = sprintf(
        /* translators: %s: post author. */
            esc_html_x( 'par %s', 'post author', 'qui-appelle' ),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span>';

    }
endif;

if ( ! function_exists( 'wp_bootstrap_4_entry_footer' ) ) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function custom_entry_footer() {
        // Hide category and tag text for pages.
        if ( 'post' === get_post_type() ) { ?>

            <div class="cat-links"><span class="etiquette">Catégorie(s): </span><?php the_category( ', ' ); ?></div>

            <span class="tags-links">
				<?php the_tags( ' <span class="badge badge-light badge-pill text-muted">#', '</span> <span class="badge badge-light badge-pill text-muted">#', '</span>' ); ?>
			</span>

        <?php
        }

        if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
            echo '<span class="comments-link">';
            comments_popup_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: post title */
                        __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'wp-bootstrap-4' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                )
            );
            echo '</span>';
        }

        edit_post_link(
            sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Edit <span class="screen-reader-text">%s</span>', 'wp-bootstrap-4' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
endif;