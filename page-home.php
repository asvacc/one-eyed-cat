<?php
/**
 * Template Name: Homepage
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header();


$carousel = get_field('header_carousel');

$images = $carousel['background_images'];
?>
<header data-speed="<?php echo $carousel['animation_speed']; ?>">
    <div class="centered">
        <img src="<?php echo TEMPLATE_DIR_URI . '/images/logo.png';?>" alt="One Eyed Cat Brewing">
        <h1>One-Eyed Cat Brewing</h1>
    </div>

    <?php
        if($images)
        {
            $slideLength = count($images);

            echo "<div class='controls'>";
            for($i=0;$i<$slideLength;$i++){
                echo '<div data-slide="' . ($i+1) . '" class="dot' . ($i == 0 ? ' active' : '') . '"></div>';
            }
            echo "</div>";
            echo "<div class='slides'>";
            for($i=0;$i<$slideLength;$i++){
                $image = $images[$i]['background_image'];
                echo '<div data-slide="'.($i+1) .'" class="slide' . ($i == 0 ? ' active' : '') . '" style="background-image:url(' . $image . ')"></div>';
            }
            echo "</div>";
        }
    ?>
</header>

<?php

Sections::render();

get_footer();
