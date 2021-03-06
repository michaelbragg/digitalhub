<?php
/**
 * The template for displaying taxonomy terms with links.
 *
 * @package DigitalHub
 */

$taxonomies = 'formats';
$args = array(
  'orderby'       => 'count',
  'order'         => 'DESC',
  'hide_empty'    => true,
);
$terms = get_terms( $taxonomies, $args );
$count = count($terms);

?>

<section class="adverts__nav box separator--horizontal grid ss__1-4 ms__1-6 ls__1-12 xls__1-18 cf">
<?php

  if ( $count > 0 ){

    echo '<ul class="list list__inline">';

    foreach ( $terms as $term ) {

      $url = '#' . $term->slug;

      echo '<li><a href="' . $url . '">' . $term->name . '</a></li>';

    }

    echo '</ul>';

  }
?>
</section>