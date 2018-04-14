<?php
/**
 * The template for displaying artist
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package One_Eyed_Cat_Brewing
 */

use OneEyedCat\Core\Models\Artist\Model as Model;
get_header();
$artist = new Model(get_the_id());
?>
<header class="short" style="background-image:linear-gradient(rgba(0,0,0,.8), rgba(0,0,0,.8)), url(<?php echo $artist->image['url'];?>);"?>>
    <h1 class="title">Behind the Artwork</h1>
</header>
<section class="artist-bio">
    <div class="container">
        <div class="left">
            <img src="<?php echo $artist->image['url'];?>">
        </div>
        <div class="right">
            <h2><?php echo $artist->title;?></h2>
            <div class="bio">
                <?php echo $artist->description;?>
            </div>
        </div>
    </div>
</section>
<?php if(count($artist->socialMedia) > 0) : ?>
<section class="social-media">
    <div class="container">
        <h2>Connect with <?php echo $artist->title;?></h2>
        <ul>
            <?php foreach($artist->socialMedia as $socialMedia) : ?>
                <li class="<?php echo $socialMedia->website;?>"><a href="<?php echo $socialMedia->link; ?>"></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<?php endif;
get_footer();
