<?php
/**
 * Template Name: Events
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header();

$customizations = get_field('page_customizations');

$context = OneEyedCat\Core\Models\Event\Section::get_all_events();
?>
<header class="short" <?php echo empty($customizations['header_background']) ? "" :  "style=\"background-image:url(".$customizations['header_background'].");\"";?>>
    <h1 class="title"><?php the_title();?></h1>
</header>
<section class="events" id="events">
    <div class="container">
<?php
    foreach($context['events'] as $event){
        $image = $event->image['url'];
        ?>
            <div class="event" <?php echo empty($image) ? "" : 'style="background-image:url('.$image.')"';?>> 
                <a href='<?php echo $event->permalink;?>'>
                    <div class="bottom">
                        <span class="title"><?php echo $event->title;?></span>
                        <span class="date"><?php echo $event->date;?></span>
                    </div>
                </a>
            </div>
        <?php
    }
?>
</div>
</section>

<?php
Sections::render();

get_footer();
