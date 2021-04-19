<?php get_header(); ?>
<?php// while(have_posts()): the_post(); ?>
  <div class="hero" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>); ">
    <div class="hero-content">
      <div class="hero-text">
        <h2><?php echo esc_html( get_option('blogdescription') ); ?></h2>
        <?php the_content(); ?>
        <?php $url = get_page_by_title('About Us'); ?>
        <a class="button secondary" href="<?php echo get_permalink($url->ID); ?>">more info</a>
      </div>
    </div>
  </div>
<?php // endwhile;  ?>


    <div class="main-content container">
      <h2 class="primary-text text-center">Our specialties</h2>
      <main class="container-grid clear">
        <?php $args =array(
              'posts_per_page' => 3,
              'post_type' => 'Specialties',
              'category_name' => 'pizzas',
              'orderby' => 'rand'
        );
        $Specialties = new WP_Query($args);
        while($Specialties->have_posts()): $Specialties->the_post(); ?>
        <div class="specialty columns1-3">
          <div class="specialty-content">
            <?php the_post_thumbnail( 'Specialty-portrait'); ?>
            <div class="information">
              <?php the_title('<h3>', '</h3>'); ?>
              <?php the_content(); ?>
              <p class="price"><?php the_field('price'); ?></p>
              <a href="<?php the_permalink(); ?>" class="button primary">read more</a>
            </div>
          </div>
        </div>
        <?php endwhile; wp_reset_postdata() ?>

      </main>
    </div>

    <section class="Ingredients">
      <div class="container">
        <div class="container-grid">
          <?php while(have_posts()): the_post();?>
            <div class="columns2-4">
                <h3><?php the_field('Ingredients'); ?></h3>
                <?php the_field('ingredients_text'); ?>
                <?php $url = get_page_by_title('About Us'); ?>
                <a class="button primary" href="<?php echo get_permalink($url->ID); ?>">read more</a>
            </div>
            <div class="columns2-4">
                <img src="<?php the_field('image'); ?>" alt="Fresh Ingredients">
            </div>

          <?php endwhile; ?>

        </div>
      </div>
    </section>
<?php get_footer(); ?>
