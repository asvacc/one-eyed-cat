<?php
    $title = $context['menu']->title;
    $sections = $context['menu']->menuSections;
?>
<section class="menu" id="menu">
    <div class="container">
        <?php
            if(!empty($title)){
                echo "<h2>$title</h2>";
            }
        ?>
    </div>
    <?php
    if(count($sections) > 0) :
        foreach($sections as $section) :
        ?>
        <div class="row">
            <div class="container">
                <h4 class="menu-section-heading"><?php echo $section->title; ?></h4>
                <?php
                    $menuItems = array_chunk($section->menuItems, ceil(count($section->menuItems)/2));
                    if(count($menuItems[0]) > 0):?>
                        <div class="left">
                            <?php
                                foreach($menuItems[0] as $menuItem): ?>
                                <div class="row">
                                    <div class="left">
                                        <h5><?php echo $menuItem->title;?></h5>
                                        <p><?php echo $menuItem->description; ?></p>
                                    </div>
                                    <div class="right">
                                        $<?php echo $menuItem->price;?>
                                    </div>
                                </div>
                            <?php endforeach;
                            ?>
                        </div>
                    <?php endif;
                    if(count($menuItems[1]) > 0):?>
                        <div class="right">
                            <?php
                                foreach($menuItems[1] as $menuItem): ?>
                                <div class="row">
                                    <div class="left">
                                        <h5><?php echo $menuItem->title;?></h5>
                                        <p><?php echo $menuItem->description; ?></p>
                                    </div>
                                    <div class="right">
                                        $<?php echo $menuItem->price;?>
                                    </div>
                                </div>
                            <?php endforeach;
                            ?>
                        </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
        endforeach;
    endif;
    ?>
</section>