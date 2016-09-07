<?php

namespace Drupal\swiper_slider\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the Slider entity.
 *
 * @ConfigEntityType(
 *   id = "slider",
 *   label = @Translation("Slider"),
 *   handlers = {
 *     "list_builder" = "Drupal\swiper_slider\SliderListBuilder",
 *     "form" = {
 *       "add" = "Drupal\swiper_slider\Form\SliderForm",
 *       "edit" = "Drupal\swiper_slider\Form\SliderForm",
 *       "delete" = "Drupal\swiper_slider\Form\SliderDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\swiper_slider\SliderHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "slider",
 *   admin_permission = "administer site configuration",
 *   bundle_of = "slide",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/config/content/slider/{slider}",
 *     "add-form" = "/admin/config/content/slider/add",
 *     "edit-form" = "/admin/config/content/slider/{slider}/edit",
 *     "delete-form" = "/admin/config/content/slider/{slider}/delete",
 *     "collection" = "/admin/config/content/slider"
 *   }
 * )
 */
class Slider extends ConfigEntityBundleBase implements SliderInterface {

  /**
   * The Slider ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Slider label.
   *
   * @var string
   */
  protected $label;

}
