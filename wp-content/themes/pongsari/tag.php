<?php get_header(); ?>

			<div id="content">

				<h1 class="page-title"><?php
					printf( __( 'Tag Archives: %s', 'pongsari' ), '<span>' . single_tag_title( '', false ) . '</span>' );
				?></h1>

				<?php
				 get_template_part( 'loop', 'tag' );
				?>
			</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
