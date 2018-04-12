<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package One_Eyed_Cat_Brewing
 */

?>
		<footer>
			<div class="container">
				<div class="top">
					<div class="column hours">
						<?php dynamic_sidebar('footer_column_1');?>
					</div>
					<div class="column address">
						<?php dynamic_sidebar('footer_column_2');?>
					</div>
				</div>
				<div class="bottom">
					<div class="column facebook">
						<?php dynamic_sidebar('footer_column_3');?>
					</div>
					<div class="column twitter">
						<?php dynamic_sidebar('footer_column_4');?>
					</div>
				</div>
			</div>
			<p class="copyright">&copy; <?php echo date('Y'); ?> One-Eyed Cat Brewing Company</p>
       </footer>

	</div><!-- #content -->
</div><!-- wrapper -->

<?php wp_footer(); ?>
</body>
</html>
