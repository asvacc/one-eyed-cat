<section class="wysiwyg <?php echo $context['wysiwyg']->background; ?>">
    <div class="container">
        <?php echo apply_filters('the_content', $context['wysiwyg']->content); ?>
    </div>
</section> 