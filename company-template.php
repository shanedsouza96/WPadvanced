<?php
/*
  Template Name: Company Template
*/
?>


<?php get_header(); ?>

<div class="container content">
		<div class="main block">
			<?php if(have_posts()) : ?>
				<?php while(have_posts()) : the_post(); ?>
          <h2><?php the_title();?></h2>
          <p class="phone">Call Us: 090078601</p>
          <?php the_content(); ?>
				<?php endwhile; ?>
			<?php else : ?>
				<?php echo apautop('Sorry, no posts were found'); ?>
			<?php endif; ?>
		</div>

		<div class="side">
			<?php if(is_active_sidebar( 'sidebar' )): ?>
				<?php dynamic_sidebar( 'sidebar' ); ?>
			<?php endif; ?>
		</div>
	</div>

<?php get_footer(); ?>
