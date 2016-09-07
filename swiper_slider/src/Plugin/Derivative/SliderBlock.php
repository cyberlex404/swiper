<?php

/**
 * @file
 * Contains \Drupal\demo\Plugin\Derivative\SliderBlock.
 */

namespace Drupal\swiper_slider\Plugin\Derivative;

use Drupal\Component\Plugin\Derivative\DeriverBase;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Plugin\Discovery\ContainerDeriverInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides block plugin definitions for nodes.
 *
 * @see \Drupal\demo\Plugin\Block\SliderBlock
 */
class SliderBlock extends DeriverBase implements ContainerDeriverInterface {

  /**
   * The node storage.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  protected $sliderStorage;

  /**
   * Constructs new SliderBlock.
   *
   * @param \Drupal\Core\Entity\EntityStorageInterface $slider_storage
   *   The slider storage.
   */
  public function __construct(EntityStorageInterface $slider_storage) {
    $this->sliderStorage = $slider_storage;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, $base_plugin_id) {
    return new static(
      $container->get('entity.manager')->getStorage('slider')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getDerivativeDefinitions($base_plugin_definition) {
    $sliders = $this->sliderStorage->loadMultiple();
    foreach ($sliders as $slider) {
      $this->derivatives[$slider->id()] = $base_plugin_definition;
      $this->derivatives[$slider->id()]['admin_label'] = t('Slider block: ') . $slider->label();
    }
    dpm($this->derivatives);
    return $this->derivatives;
  }
}