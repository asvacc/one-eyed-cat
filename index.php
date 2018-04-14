<?php
/**
 * Template Name: News
 *
 * @package WordPress
 */
get_header();

$customizations = get_field('page_customizations');
?>

<header class="short" <?php echo empty($customizations['header_background']) ? "" :  "style=\"background-image:url(".$customizations['header_background'].");\"";?>>
    <h1 class="title"><?php echo single_post_title(); ?></h1>
</header>
<section class="events">
    <div class="container">
<?php

if ( have_posts() ) :
    ?> 
    <div class="clearfix">
        <?php 
    while ( have_posts() ) :
        the_post();
        $featuredImage = get_the_post_thumbnail_url(get_the_ID(),'full');
        ?>

         <div class="event" <?php echo empty($featuredImage) ? "" : 'style="background-image:url('.$featuredImage.')"';?>> 
                <a href='<?php the_permalink(); ?>'>
                    <div class="bottom">
                        <span class="title"><?php the_title(); ?></span>
                        <span class="date"><?php the_date(); ?></span>
                    </div>
                </a>
            </div>
            <?php
    endwhile;
    ?> 
    </div>
    <?php
    the_posts_pagination( array(
        'mid_size'  => 3,
        'prev_text' => __( '<i class="fas fa-chevron-left"></i>', 'textdomain' ),
        'next_text' => __( '<i class="fas fa-chevron-right"></i>', 'textdomain' )
    ) );
endif;
?>
</div>
</section>

<?php
get_footer(); 
