<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package One_Eyed_Cat_Brewing
 */

get_header();

setup_postdata(get_the_id());

$featuredImage = get_the_post_thumbnail_url(get_the_ID(),'full');
?>

<header class="short" <?php echo !empty($featuredImage) ? "style='background-image:url($featuredImage)'" : "";?>)>
    <h1 class="title"><?php the_title();?></h1>
</header>
<section class="event-details">
    <div class="container">
    <h4><?php the_date();?></h4>
    <div class="event-description">
        <?php the_content(); ?>                            
    </div>
    </div>
</section>
<section class="article-button">
    <div class="container">
        <a href="#" onclick="window.history.go(-1)" class="button">Go Back</a>
    </div>
</section>


<?php
get_footer();
