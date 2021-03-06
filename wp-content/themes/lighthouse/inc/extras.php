<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Lighthouse
 *
 * Please browse readme.txt for credits and forking information
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function lighthouse_body_classes( $classes ) {
  // Adds a class of group-blog to blogs with more than 1 published author.
  if ( is_multi_author() ) {
    $classes[] = 'group-blog';
  }

  return $classes;
}
add_filter( 'body_class', 'lighthouse_body_classes' );

if ( ! function_exists( 'lighthouse_header_menu' ) ) :
    /**
     * Header menu (should you choose to use one)
     */
  function lighthouse_header_menu() {
      // display the WordPress Custom Menu if available
    wp_nav_menu(array(
      'theme_location'    => 'primary',
      'depth'             => 2,
      'container'         => 'div',
      'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
      'menu_class'        => 'nav navbar-nav',
      'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
      'walker'            => new wp_bootstrap_navwalker()
      ));
  } /* end header menu */
  endif;



/**
 * Adds the URL to the top level navigation menu item
 */
function  lighthouse_add_top_level_menu_url( $atts, $item, $args ){
  if ( isset($args->has_children) && $args->has_children  ) {
    $atts['href'] = ! empty( $item->url ) ? $item->url : '';
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'lighthouse_add_top_level_menu_url', 99, 3 );





/** BACKEND **/

add_action( 'admin_menu', 'lighthouse_register_backend' );
function lighthouse_register_backend() {
  add_theme_page( __('About Lighthouse', 'lighthouse'), __('Lighthouse', 'lighthouse'), 'edit_theme_options', 'about-lighthouse.php', 'lighthouse_backend');
}

function lighthouse_backend(){ ?>
<div class="text-centering">
  <div class="backend-css customize-lighthouse">
    <h2><?php echo __( 'Welcome to Lighthouse', 'lighthouse' ); ?></p></h2>
    <p><?php echo __( 'Get started and customize your awesome new blog theme', 'lighthouse' ); ?></p>
    <a href="<?php echo admin_url('/customize.php'); ?>" target="_blank" class="backend_btn"><?php echo __('Customize Theme','lighthouse'); ?></a>
  </div>
</div>

<h2 class="headline-second"><?php echo __( 'Got Questions or Need Help?', 'lighthouse' ); ?></h2>
<div class="text-centering">
 <div class="backend-css customize-lighthouse">
  <p><a href="https://lighthouseseooptimization.github.io/wordpress/lighthouse/#contact" target="_blank"><?php echo __( 'Email us here', 'lighthouse' ); ?></a> or <?php echo __( 'write to us directly at: Beseenseo@gmail.com <br><br><em>You can also read our F.A.Q further down on this page.</em>', 'lighthouse' ); ?></p>
</div>
</div>
<div class="text-centering"><br><br>
  <a href="https://lighthouseseooptimization.github.io/wordpress/lighthouse/" target="_blank">
    <img src="https://raw.githubusercontent.com/lighthouseseooptimization/wordpress/master/lighthouse/img/docimage.png" alt="">
  </a>
</div>

<h2 class="headline-second"><?php echo __( 'Frequently Asked Questions', 'lighthouse' ); ?></h2>
<br>
<section class="ac-container">


  <div>
    <input id="ac-1" name="accordion-1" type="radio">
    <label for="ac-1">
      <?php echo __( 'How do I add a logo?', 'lighthouse' ); ?>
    </label>
    <article class="ac-large">
      <p>
           <?php echo __( 'In the WordPress admin sidebar, go to Appearance > Customize > Site Identity', 'lighthouse' ); ?>
      </p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-2" name="accordion-2" type="radio">
    <label for="ac-2">
      <?php echo __( 'How do I change theme color?', 'lighthouse' ); ?>
    </label>
    <article class="ac-large">
      <p>
           <?php echo __( 'In the WordPress admin sidebar, go to Appearance > Customize > Colors', 'lighthouse' ); ?>
      </p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-3" name="accordion-3" type="radio">
    <label for="ac-3">
      <?php echo __( 'Header Text/Background Color?', 'lighthouse' ); ?>
    </label>
    <article class="ac-large">
      <p>
           <?php echo __( 'In the WordPress admin sidebar, go to Appearance > Customize > Colors', 'lighthouse' ); ?>
      </p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-4" name="accordion-4" type="radio">
    <label for="ac-4">
      <?php echo __( 'How do I change Post/page Colors?', 'lighthouse' ); ?>
    </label>
    <article class="ac-large">
      <p>
           <?php echo __( 'In the WordPress admin sidebar, go to Appearance > Customize > Colors <br> <br> Changing link color is currently only possible in Lighthouse Pro', 'lighthouse' ); ?>
      </p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-5" name="accordion-5" type="radio">
    <label for="ac-5">
      <?php echo __( 'How do I change sidebar colors?', 'lighthouse' ); ?>
    </label>
    <article class="ac-large">
      <p>
           <?php echo __( 'In the WordPress admin sidebar, go to Appearance > Customize > Colors', 'lighthouse' ); ?>
      </p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-6" name="accordion-6" type="radio">
    <label for="ac-6">
      <?php echo __( 'How do I change post/page link color?', 'lighthouse' ); ?>
    </label>
    <article class="ac-large">
      <p>
           <?php echo __( 'This feature is currently only available in Lighthouse Pro', 'lighthouse' ); ?>
      </p>
    </article>
  </div>
</section>


<section class="ac-container">
  <div>
    <input id="ac-13" name="accordion-13" type="radio">
    <label for="ac-13">
      <?php echo __( 'How do I only show the header image on the front page?', 'lighthouse' ); ?>
    </label>
    <article class="ac-large">
      <p>
           <?php echo __( 'This feature is currently only available in Lighthouse Pro', 'lighthouse' ); ?>
      </p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-7" name="accordion-7" type="radio">
    <label for="ac-7">
      <?php echo __( 'How do I change Copyright Text?', 'lighthouse' ); ?>
    </label>
    <article class="ac-large">
      <p>
           <?php echo __( 'This feature is currently only available in Lighthouse Pro', 'lighthouse' ); ?>
      </p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-13" name="accordion-13" type="radio">
    <label for="ac-13">
      <?php echo __( 'How do I changeHeader image Text?', 'lighthouse' ); ?>
    </label>
    <article class="ac-large">
      <p>
           <?php echo __( 'This feature is currently only available in Lighthouse Pro', 'lighthouse' ); ?>
      </p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-8" name="accordion-8" type="radio">
    <label for="ac-8">
      <?php echo __( 'How do I make the top widgets only appear on the front page?', 'lighthouse' ); ?>
    </label>
    <article class="ac-large">
      <p>
           <?php echo __( 'This feature is currently only available in Lighthouse Pro', 'lighthouse' ); ?>
      </p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-9" name="accordion-9" type="radio">
    <label for="ac-9">
      <?php echo __( 'How do I Change Navigation Colors?', 'lighthouse' ); ?>
    </label>
    <article class="ac-large">
      <p>
           <?php echo __( 'This feature is currently only available in Lighthouse Pro', 'lighthouse' ); ?>
      </p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-10" name="accordion-10" type="radio">
    <label for="ac-10">
      <?php echo __( 'How do I Change Footer Colors?', 'lighthouse' ); ?>
    </label>
    <article class="ac-large">
      <p>
           <?php echo __( 'This feature is currently only available in Lighthouse Pro', 'lighthouse' ); ?>
      </p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-11" name="accordion-11" type="radio">
    <label for="ac-11">
      <?php echo __( 'How do I hide the author byline?', 'lighthouse' ); ?>
    </label>
    <article class="ac-large">
      <p>
           <?php echo __( 'This feature is currently only available in Lighthouse Pro', 'lighthouse' ); ?>
      </p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-12" name="accordion-12" type="radio">
    <label for="ac-12">
      <?php echo __( 'Is Lighthouse Pro a one time fee?', 'lighthouse' ); ?>
    </label>
    <article class="ac-large">
      <p>
           <?php echo __( 'Yes, if you purchase Lighthouse Pro you will get every update for free through Email', 'lighthouse' ); ?>
      </p>
    </article>
  </div>
</section>

<?php }

