<?php

namespace Drupal\swiper_slider\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Swiper slide entities.
 *
 * @ingroup swiper_slider
 */
interface SwiperSlideInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Swiper slide type.
   *
   * @return string
   *   The Swiper slide type.
   */
  public function getType();

  /**
   * Gets the Swiper slide name.
   *
   * @return string
   *   Name of the Swiper slide.
   */
  public function getName();

  /**
   * Sets the Swiper slide name.
   *
   * @param string $name
   *   The Swiper slide name.
   *
   * @return \Drupal\swiper_slider\Entity\SwiperSlideInterface
   *   The called Swiper slide entity.
   */
  public function setName($name);

  /**
   * Gets the Swiper slide creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Swiper slide.
   */
  public function getCreatedTime();

  /**
   * Sets the Swiper slide creation timestamp.
   *
   * @param int $timestamp
   *   The Swiper slide creation timestamp.
   *
   * @return \Drupal\swiper_slider\Entity\SwiperSlideInterface
   *   The called Swiper slide entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Swiper slide published status indicator.
   *
   * Unpublished Swiper slide are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Swiper slide is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Swiper slide.
   *
   * @param bool $published
   *   TRUE to set this Swiper slide to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\swiper_slider\Entity\SwiperSlideInterface
   *   The called Swiper slide entity.
   */
  public function setPublished($published);

}
