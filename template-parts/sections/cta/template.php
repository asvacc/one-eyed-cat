<section class="cta">
    <div class="container">
        <?php
            if(!empty($context['cta']->topText)){
                echo "<h2>". $context['cta']->topText."</h2>";
            }

            if(!empty($context['cta']->buttonText && !empty($context['cta']->buttonUrl))){
                echo "<a href='". $context['cta']->buttonUrl . "' class='button light'>" . $context['cta']->buttonText . "</a>";
            }

            if(!empty($context['cta']->bottomText)){
                echo "<h4>" . $context['cta']->bottomText . "</h4>";
            }
        ?>
    </div>
</section>