<?php
/**
 * Template Name: Beers
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header();
$title = get_the_title();
use OneEyedCat\Core\Models\Beer\Model as Beer;

$customizations = get_field('page_customizations');

$beers = array();
$mainstays = get_field('mainstays');
$seasonals = get_field('seasonals');
if($mainstays){
    foreach($mainstays as $post){
        setup_postdata($post);
        $beers['mainstays'][] = new Beer($post);
    }
}
if($seasonals){
    foreach($seasonals as $post){
        setup_postdata($post);
        $beers['seasonals'][] = new Beer($post);
    }
}

?>
<header class="short" <?php echo empty($customizations['header_background']) ? "" :  "style=\"background-image:url(".$customizations['header_background'].");\"";?>>
    <h1 class="title"><?php echo $title;?></h1>
</header>
<section class="wysiwyg black">
    <div class="container">
        <a href="#mainstays" class="button">Mainstays</a>
        <a href="#seasonals" class="button">Seasonals</a>
    </div>
</section>
<?php if(count($beers['mainstays']) > 0): ?>
<section class="beer-list" id="mainstays">
    <div class="container">
        <h2 class="title">The Mainstays</h2>
    </div>
    <?php foreach($beers['mainstays'] as $beer) :?>
    <div class="row">
        <div class="container">
            <a href="<?php echo $beer->artist->permalink;?>" class="left">
            
            </a>
            <div class="right">
                <h2 class="beer-name"><?php echo $beer->title;?></h2>
                <h4 class="beer-type"><?php echo $beer->type;?></h4>
                <div class="beer-description">
                    <?php echo $beer->description;?>
                </div>
                <?php if(!empty($beer->abv) || !empty($beer->ibu)): ?>
                <hr/>
                <span class="stats">
                    <?php
                        $output = array();
                        if(!empty($beer->abv))
                            $output[] = "ABV: $beer->abv%";

                        if(!empty($beer->ibu))
                            $output[] = "$beer->ibu IBU";
                    
                        echo implode(" // ", $output);
                    ?>
                </span>
                <?php endif;?>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</section>  
<?php endif; ?>

<?php if(count($beers['seasonals']) > 0): ?>
<section class="beer-list" id="seasonals">
    <div class="container">
        <h2 class="title">Seasonal Beers</h2>
    </div>
    <?php foreach($beers['seasonals'] as $beer) :?>
    <div class="row">
        <div class="container">
            <a href="<?php echo $beer->artist->permalink;?>" class="left">
            
            </a>
            <div class="right">
                <h2 class="beer-name"><?php echo $beer->title;?></h2>
                <h4 class="beer-type"><?php echo $beer->type;?></h4>
                <div class="beer-description">
                    <?php echo $beer->description;?>
                </div>
                <?php if(!empty($beer->abv) || !empty($beer->ibu)): ?>
                <hr/>
                <span class="stats">
                    <?php
                        $output = array();
                        if(!empty($beer->abv))
                            $output[] = "ABV: $beer->abv%";

                        if(!empty($beer->ibu))
                            $output[] = "$beer->ibu IBU";
                    
                        echo implode(" // ", $output);
                    ?>
                </span>
                <?php endif;?>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</section>  
<?php endif; ?>

<?php
Sections::render();

get_footer();
