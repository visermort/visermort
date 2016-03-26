<?php get_header(); ?>


	<?php get_sidebar();  ?>

		<div class="content-area">

			<section class="content-part content-">
				<h1 class="content-header">Мои работы</h1>
				<div class="content-content ">

					<ul class="pages clearfix">

					<?php if ( have_posts() ){ ?>
					   <?php  while ( have_posts() ){ the_post();
							if (!in_category('9')) continue;
							$link = get_post_meta( $post->ID , 'link', true);
							?>

						<li class="page">
							<div class="projects-item">
								  <div class="hover-img">
									<?php the_post_thumbnail( array(190,120), ' class=project-img ' ) ?>
										<div class="zoom-wrapper">
										  <a href="<?php echo $link?>" target="_blank" class="zoom-link">Подробнее</a>
										</div>
								</div>
							</div>
							 <h3 class="page-title">
								 <?php the_title() ?>
							 </h3>
							 <giv class="page-description">
								 <?php the_content() ?>
							 </giv>
						</li>

						<?php }} else {  ?>
					<?php }   ?>
					</ul>

				</div>
			</section>

<?php get_footer()  ?>