<?php

namespace Drupal\swiper_slider\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides Views data for Swiper slide entities.
 */
class SwiperSlideViewsData extends EntityViewsData implements EntityViewsDataInterface {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['slide']['table']['base'] = array(
      'field' => 'id',
      'title' => $this->t('Swiper slide'),
      'help' => $this->t('The Swiper slide ID.'),
    );

    return $data;
  }

}
