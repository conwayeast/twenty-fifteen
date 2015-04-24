<?php
/**
 * The template for displaying resume and experience
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Post thumbnail.
		twentyfifteen_post_thumbnail();
	?>

	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'twentyfifteen' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

		?>

	<!-- WORK EXPERIENCE -->
	<header>
		<h2 style="margin-top: 0; margin-bottom: 0;">Work Experience</h2>
	</header><!-- /header -->

<div style="margin-bottom: 3em;">



		<?php $experience = new WP_Query(array(
			'post_type'	=>	'experience'
		)); ?>
		<?php while($experience->have_posts()) : $experience->the_post(); ?>
			<div class="container__what-where-when">
				<div class="container__what-where">
					<h3 class="title__what"><?php the_field( 'title' ); ?></h3>
					<h4 class="title__where"><?php the_field( 'company' ); ?></h4>
				</div>
				<div class="container__when">
					<h4 class="title__when"><?php the_field( 'dates' ); ?></h4>
				</div>
				<div class="container__description">
					<?php the_field( 'detailed_description' ); ?>
				</div>
			</div>
		<?php endwhile; ?>
</div>


<div style="margin-top: 3em;">
	<!-- EDUCATION -->
		<header>
			<h2>Education</h2>
		</header><!-- /header -->

		<?php $school = new WP_Query(array(
				'post_type'	=>	'school'
			)); ?>
			<?php while($school->have_posts()) : $school->the_post(); ?>
			<div class="container__what-where-when">
				<div class="container__what-where">
					<h3 class="title__what"><?php the_field( 'school' ); ?></h3>
					<h4 class="title__where"><?php the_field( 'degree' ); ?></h4>
				</div>
				<div class="container__when">
					<h4 class="title__when"><?php the_field( 'dates' ); ?></h4>
				</div>
			</div>
			<?php endwhile; ?>
</div>

	</div><!-- .entry-content -->


	<footer class="entry-footer">
		<?php twentyfifteen_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
