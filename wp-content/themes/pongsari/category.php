﻿<?php get_header(); ?>

			<div id="content">

				<h1 class="page-title"><?php
					printf( __( 'Archives catégorie: %s', 'pongsari' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?></h1>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';

				get_template_part( 'loop', 'category' );
				?>

			</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
