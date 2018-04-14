<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package One_Eyed_Cat_Brewing
 */

get_header();
?>
<header class="short">
    <h1 class="title">That page can't be found</h1>
</header>
<section class="_404">
	<div class="container">
		<a href="<?php echo get_site_url(); ?>"><img src="<?php echo TEMPLATE_DIR_URI . '/images/logo.png';?>" alt="One Eyed Cat Brewing"></a>
        <h2>Click the cat to go home</h2>
	</div>
</section>
<?php
get_footer();
