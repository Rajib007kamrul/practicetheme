<?php
/**
* Template Name: Specialties Width Page
*
*/

get_header(); ?>

<?php while(have_posts()): the_post(); ?>
<div class="hero" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>); ">
  <div class="hero-content">
    <div class="hero-text">

      <h2><?php the_title(); ?></h2>
    </div>
  </div>
</div>

<div class="main-content container">
  <main class="text-center content-text">
    <?php the_content(); ?>
  </main>
</div>


<?php endwhile;  ?>

<div class="our-Specialties container">
  <h3 class="primary-text">Pizzas</h3>
  <div class="container-grid Specialty-content">
    <?php
						 $args = array(
								'post_type' 			=>	'Specialties',
								'posts_per_page' 	=> 	10,
								'order_by' 				=> 	'Title',
								'order'						=> 'ASC',
								'category_name'   => 'pizzas'
						 );

						$pizzas = new WP_Query($args);

						while( $pizzas->have_posts() ): $pizzas->the_post(); ?>

    <!-- <h2><?php// the_title(); ?></h2> -->

    <div class="columns2-4 Specialty-content">
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('Specialties'); ?>
        <h4><?php the_title(); ?> <span><?php the_field('price'); ?></span> </h4>
        <?php the_content(); ?>
      </a>
    </div>
    <?php  endwhile; wp_reset_postdata(); ?>
  </div>


  <h3 class="primary-text">Other</h3>
  <div class="container-grid Specialty-content">
    <?php
						 $args = array(
								'post_type' 			=>	'Specialties',
								'posts_per_page' 	=> 	10,
								'order_by' 				=> 	'Title',
								'order'						=> 'ASC',
								'category_name'   => 'others'
						 );

								 $otherpizzas = new WP_Query($args);
								 while( $otherpizzas->have_posts() ): $otherpizzas->the_post(); ?>
    <h2><?php// the_title(); ?></h2>
    <div class="columns2-4">
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('Specialties'); ?>
        <h4><?php the_title(); ?> <span><?php the_field('price'); ?></span> </h4>
        <?php the_content(); ?>
      </a>
    </div>
    <?php  endwhile; wp_reset_postdata(); ?>
  </div>

</div>
<?php get_footer(); ?>