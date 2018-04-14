<?php
$title = $context['event']->title;
$linkText = $context['event']->linkText;
$linkUrl = $context['event']->linkUrl;
$events = $context['event']->events;
?>

<section class="events" id="events">
    <div class="container">
        <h2><?php echo $title ?></h2>
        <div class="clearfix">
        <?php
            foreach($events as $event){
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
        <a href="<?php echo $linkUrl; ?>" class="button"><?php echo $linkText; ?></a>
    </div>
</section>