<?php
$title = $context['list']->title;
$items = array_chunk($context['list']->listItems, ceil(count($context['list']->listItems)/2));
?>
<section class="where-to-find-us black">
    <div class="container">
        <?php
            if(!empty($title)){
                echo "<h2>$title</h2>";
            }
        ?>
        <?php
            if(count($items[0]) > 0){
                ?>
                <div class="left">
                    <ul>
                        <?php
                            foreach($items[0] as $item){
                                echo "<li>$item</li>";
                            }
                        ?>
                    </ul>
                </div>
                <?php
            }

            if(count($items[1]) > 0){
                ?>
                <div class="right">
                    <ul>
                        <?php
                            foreach($items[1] as $item){
                                echo "<li>$item</li>";
                            }
                        ?>
                    </ul>
                </div>
                <?php
            }
        ?>
    </div>
</section>