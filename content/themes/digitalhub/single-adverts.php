<?php
/**
 * Represents the view for the public-facing component of the plugin.
 *
 * This typically includes any information, if any, that is rendered to the
 * frontend of the theme when the plugin is activated.
 *
 * @package   Adverts
 * @author    Michael Bragg <michael@michaelbragg.net>
 * @license   GPL-2.0+
 * @link      http://trinitymirror.github.io
 * @copyright 2013 Trinity Mirror Creative
 */
?>

<?php
global $post;
$custom = get_post_custom();
$terms = get_the_terms( $post->ID, 'formats' );
?>

<?php get_header(); ?>

  <div class="wrapper__sub">

    <div id="primary" class="content-area">

      <main id="main" class="site-main" role="main">

        <?php /* The loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

          <section class="grid ss__1-4 ms__1-6 ls__1-5 xls__1-7">

            <header class="entry-header">

              <?php if ( is_single() ) : ?>
              <h1 class="entry-title"><?php the_title(); ?></h1>
              <?php else : ?>
              <h1 class="entry-title">
                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
              </h1>
              <?php endif; // is_single() ?>

              <?php edit_post_link( __( 'Edit' ), '<p class="edit-link">', '</p>' ); ?>

            </header>

            <?php if ( is_search() ) : // Only display Excerpts for Search ?>
            <div class="entry-summary box">
                <?php the_excerpt(); ?>
              </div><!-- .entry-summary -->
              <?php else : ?>
              <div class="entry-content box separator--horizontal">
                <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?>
                <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
            </div><!-- .entry-content -->
            <?php endif; ?>

            <div class="entry-meta box">
              <?php if ( is_buildGuide() ) :?>
                <p>
                  <a class="btn btn--primary" target="_blank" href="
                  <?php the_buildGuide(); ?>">View Build Guide <span class="sprite sprite--download icon icon__append"></span></a>
                </p>
              <?php endif; ?>
            </div>

            <?php if ( is_example() ) : // Only display if examples exist ?>

            <footer class="example__preview box">

              <section class="entry-meta box">
                <ul class="list list__inline">
                  <?php get_example_preview($custom); ?>
                </ul>
              </section>

              <section class="entry-meta box">
              <?php
                $url = wp_get_referer();
                $path_parts = pathinfo($url);

                // Check for referrer page
                if( !empty($url) ) {
                  echo '<a class="btn btn--primary" href="' . $url . '"><span class="sprite sprite--back icon icon__prepend"></span>'. 'Back to '. $path_parts['filename'] .'</a>';
                }
              ?>
              </section>

            </footer>

          <?php endif; ?>

          </section>
          <aside class="grid ss__1-4 ms__1-6 ls__6-12 xls__8-18 example<?php
          if(has_term( 'app', 'formats') || has_term( 'responsive', 'formats')) {
            echo ' example--app';
          } else {
            echo ' example--desktop';
          }
          ?>">


          <?php get_example_video($custom); ?>

          </aside>

        </article><!-- #post -->
      <?php comments_template(); ?>

      <?php endwhile; ?>

    </main><!-- #main -->
  </div><!-- #primary -->

  </div><!--/ wrapper__sub  -->

<?php get_footer(); ?>
