<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main id="content">

  <?php if( get_option('ngo_charity_donation_slider_arrows', false) !== 'off'){ ?>
    <section id="slider">
      <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <?php $ngo_charity_donation_slider_count = get_theme_mod('ngo_charity_donation_slider_count');
          for ( $i = 1; $i <= $ngo_charity_donation_slider_count; $i++ ) {
            $ngo_charity_donation_mod =  get_theme_mod( 'ngo_charity_donation_post_setting' . $i );
            if ( 'page-none-selected' != $ngo_charity_donation_mod ) {
              $ngo_charity_donation_slide_post[] = $ngo_charity_donation_mod;
            }
          }
           if( !empty($ngo_charity_donation_slide_post) ) :
          $ngo_charity_donation_args = array(
            'post_type' =>array('post'),
            'post__in' => $ngo_charity_donation_slide_post,
            'ignore_sticky_posts'  => true, // Exclude sticky posts by default
          );

          // Check if specific posts are selected
          if (empty($ngo_charity_donation_slide_post) && is_sticky()) {
            $ngo_charity_donation_args['post__in'] = get_option('sticky_posts');
          }

          $charity_foundation_query = new WP_Query( $ngo_charity_donation_args );
          if ( $charity_foundation_query->have_posts() ) :
            $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php  while ( $charity_foundation_query->have_posts() ) : $charity_foundation_query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <div class="row">
              <div class="col-lg-6 col-md-6 slide-content ">
                <div class="carousel-caption px-5 px-md-3">
                  <div class="slider-inner">
                  <?php if (get_theme_mod('ngo_charity_donation_slide_heading') != '') { ?>
                    <h3><?php echo esc_html(get_theme_mod('ngo_charity_donation_slide_heading', '')); ?></h3>
                  <?php } ?>
                  <h2 class="slider-title"><?php the_title();?></h2>
                  <?php if( get_option('ngo_charity_donation_slider_excerpt_show_hide',false) != 'off'){ ?>
                    <p class="slider-excerpt mb-0"><?php echo wp_trim_words(get_the_content(), get_theme_mod('ngo_charity_donation_slider_excerpt_count',20) );?></p>
                  <?php } ?>
                  <div class="home-btn  my-4">
                    <a class="py-2 px-3 py-lg-3 px-lg-4" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('ngo_charity_donation_slider_read_more',__('DONATE NOW','charity-foundation'))); ?></a>
                  </div>
                </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 image-content">
                <?php if(has_post_thumbnail()){ ?>
                  <img src="<?php the_post_thumbnail_url('full'); ?>"/>
                <?php }else{?>
                  <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/image.png" alt="" />
                <?php } ?>
              </div>
            </div>
          </div>
          <?php $i++; endwhile;
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
        <div class="no-postfound"></div>
          <?php endif;
        endif;?>
          <a class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-long-arrow-alt-left"></i></span>
          </a>
          <a class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-long-arrow-alt-right"></i></span>
          </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php } ?>
  <?php if( get_option('ngo_charity_donation_volunteer_show_hide', false) !== 'off'){ ?>
    <section id="volunteer" class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-12 align-self-center">
            <?php if( get_theme_mod('ngo_charity_donation_volunteer_title') != '' ){ ?>
              <h3 class="mb-4 text-center text-md-start"><?php echo esc_html(get_theme_mod('ngo_charity_donation_volunteer_title','')); ?></h3>
            <?php }?>
            <?php if( get_theme_mod('ngo_charity_donation_volunteer_btn_link') != '' || get_theme_mod('ngo_charity_donation_volunteer_btn_text') != ''){ ?>
              <p class="home-btn mb-md-0 text-center text-md-start"><a href="<?php echo esc_url(get_theme_mod('ngo_charity_donation_volunteer_btn_link','')); ?>"><?php echo esc_html(get_theme_mod('ngo_charity_donation_volunteer_btn_text','')); ?></a></p>
            <?php }?>
          </div>
          <div class="col-lg-8 col-md-8 col-12 align-self-center">
            <div class="row">

              <?php $ngo_charity_donation_volunteer = get_theme_mod('ngo_charity_donation_volunteer_increament');

              for ($i=1; $i <= $ngo_charity_donation_volunteer; $i++) { ?>

                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class="volunteer-box mb-3 wow swing" data-wow-duration="2s">
                    <div class="volunteer-inner-box text-center text-md-start">
                      <?php if( get_theme_mod('ngo_charity_donation_volunteer_box_icon'.$i) != '' ){ ?>
                        <i class="<?php echo esc_attr(get_theme_mod('ngo_charity_donation_volunteer_box_icon'.$i)); ?> mb-3 mt-5"></i>
                      <?php }?>
                      <?php if( get_theme_mod('ngo_charity_donation_volunteer_box_number'.$i) != '' ){ ?>
                        <p><?php echo esc_html(get_theme_mod('ngo_charity_donation_volunteer_box_number'.$i)); ?></p>
                      <?php }?>
                      <?php if( get_theme_mod('ngo_charity_donation_volunteer_box_title'.$i) != '' ){ ?>
                        <h4><?php echo esc_html(get_theme_mod('ngo_charity_donation_volunteer_box_title'.$i)); ?></h4>
                      <?php }?>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>
  <?php if( get_option('charity_foundation_causes_show_hide', false) !== 'off'){ ?>
    <section id="causes-section" class="py-5">
      <div class="container">
        <?php if( get_theme_mod('charity_foundation_causes_section_title') != ''){ ?>
          <h2 class="text-center mb-4"><?php echo esc_html(get_theme_mod('charity_foundation_causes_section_title')); ?></h2>
        <?php }?>
        <div class="row">
          <?php
            $charity_foundation_catData=  get_theme_mod('charity_foundation_causes_section_category');
            if($charity_foundation_catData){
            $ngo_charity_donation_query = new WP_Query(array( 

              'category_name' => esc_html($charity_foundation_catData ,'charity-foundation'),

              'posts_per_page' => get_theme_mod('charity_foundation_causes_count'),

              'order'          => 'ASC'

            ));?>
            <?php while( $ngo_charity_donation_query->have_posts() ) : $ngo_charity_donation_query->the_post(); ?>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="causes-box mb-4 wow zoomIn">
                    <div class="causes-img">
                      <?php if(has_post_thumbnail()){ ?>
                        <?php the_post_thumbnail(); ?>
                      <?php }?>
                    </div>
                  <?php if( get_post_meta($post->ID, 'charity_foundation_raised', true) ||  get_post_meta($post->ID, 'charity_foundation_goal', true) ) {?>
                    <div class="prices-box">
                      <span class="me-3">
                        <?php if( get_post_meta($post->ID, 'charity_foundation_goal', true) ) {?>
                          <span class="first-word"><?php esc_html_e('Goal','charity-foundation'); ?></span>
                          <span> <?php echo esc_html(get_woocommerce_currency_symbol()); ?><?php echo esc_html(get_post_meta($post->ID,'charity_foundation_goal',true)); ?></span>
                        <?php }?>
                      </span>
                      <span>
                        <?php if( get_post_meta($post->ID, 'charity_foundation_raised', true) ) {?>
                          <span class="first-word"><?php esc_html_e('Raised','charity-foundation'); ?></span>
                          <span> <?php echo esc_html(get_woocommerce_currency_symbol()); ?><?php echo esc_html(get_post_meta($post->ID,'charity_foundation_raised',true)); ?></span>
                        <?php }?>
                      </span>
                    </div>
                  <?php }?>
                  <div class="causes-content p-3">
                    <?php if( get_post_meta($post->ID, 'charity_foundation_raised', true) != '' && get_post_meta($post->ID, 'charity_foundation_goal', true) != '' ) {
                      $charity_foundation_raised_value = get_post_meta($post->ID, 'charity_foundation_raised', true);
                      $charity_foundation_goal_value = get_post_meta($post->ID, 'charity_foundation_goal', true);
                      $charity_foundation_percent_value = round(($charity_foundation_raised_value / $charity_foundation_goal_value) * 100); ?>
                      <div class="progress_bar">
                        <div class="progress_holder">
                          <div class="progress_number"><?php echo esc_html($charity_foundation_percent_value); echo esc_html('%', 'charity-foundation'); ?></div>
                        </div>
                        <div class="progress_bar_holder">
                          <div class="progress_bar_content" style="width: <?php echo esc_html($charity_foundation_percent_value); echo esc_html('%', 'charity-foundation'); ?>; background:var(--theme-primary-color); border-radius: 30px"  data-score="100"></div>
                        </div>
                      </div>
                    <?php }?>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php echo wp_trim_words( get_the_content(),15 );?></p>
                    <?php $charity_foundation_raised_value = get_post_meta($post->ID, 'charity_foundation_raised', true);
                    $charity_foundation_goal_value = get_post_meta($post->ID, 'charity_foundation_goal', true);
                    if ($charity_foundation_raised_value != '' && $charity_foundation_goal_value != ''){
                      $charity_foundation_percent_value = round(($charity_foundation_raised_value / $charity_foundation_goal_value) * 100); ?>
                      <div class="causes-slider">
                        <div class="slide-inner" style="width: <?php echo esc_attr($charity_foundation_percent_value); echo esc_html('%', 'charity-foundation'); ?>"></div>
                      </div>
                    <?php }?>
                    <div class="home-btn my-3">
                      <a class="py-2 px-4" href="<?php the_permalink(); ?>"><?php echo esc_html('DONATE NOW','charity-foundation'); ?></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile;
            wp_reset_postdata();
          } ?>
        </div>
      </div>
    </section>
  <?php } ?>
  <section id="custom-page-content" <?php if ( have_posts() && trim( get_the_content() ) !== '' ) echo 'class="pt-3"'; ?>>
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
