<?php
/**
 * Template Name: Empty Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header();

$customizations = get_field('page_customizations');
?>
<header class="short" <?php echo empty($customizations['header_background']) ? "" :  "style=\"background-image:url(".$customizations['header_background'].");\"";?>>
    <h1 class="title"><?php the_title();?></h1>
</header>

<?php
Sections::render();
get_footer();
