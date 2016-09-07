<?php

/**
 * @file
 * Contains slide.page.inc.
 *
 * Page callback for Swiper slide entities.
 */

use Drupal\Core\Render\Element;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Prepares variables for Swiper slide templates.
 *
 * Default template: slide.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_slide(array &$variables) {
  // Fetch SwiperSlide Entity Object.
  $slide = $variables['elements']['#slide'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
