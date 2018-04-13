<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package One_Eyed_Cat_Brewing
 */

get_header();

$event = new OneEyedCat\Core\Models\Event\Model(get_the_id());
?>
<header class="short" style="background-image:url('<?php echo $event->image['url'];?>')">
    <h1 class="title"><?php echo $event->title;?></h1>
</header>
<section class="event-details">
    <div class="container">
    <h4><?php echo $event->date;?></h4>
    <div class="event-description">
        <?php echo $event->details;?>                            
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
