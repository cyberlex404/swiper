<?php

namespace Drupal\swiper_slider\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Entity\EntityManagerInterface;
use Drupal\Core\Entity\EntityViewBuilderInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\swiper_slider\Entity\SwiperSlideInterface;
use Drupal\swiper_slider\Entity\SliderInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Provides a 'SliderBlock' block.
 *
 * @Block(
 *  id = "slider_block",
 *  admin_label = @Translation("Slider block"),
 *  deriver = "Drupal\swiper_slider\Plugin\Derivative\SliderBlock",
 * )
 */
class SliderBlock extends BlockBase implements ContainerFactoryPluginInterface{


  /**
   * @var EntityViewBuilderInterface.
   */
  private $viewBuilder;

  /**
   * @var SliderInterface.
   */
  private $slider;

  /**
   * @var SwiperSlideInterface.
   */

  private $slideList;

  /**
   * Creates a SliderBlock instance.
   *
   * @param array $configuration
   * @param string $plugin_id
   * @param array $plugin_definition
   * @param EntityManagerInterface $entity_manager
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, EntityManagerInterface $entity_manager) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->viewBuilder = $entity_manager->getViewBuilder('slide');
    $this->sliderStorage = $entity_manager->getStorage('slider');
    $this->slider = $entity_manager->getStorage('slider')->load($this->getDerivativeId());
    $this->slideList = $entity_manager->getStorage('slide')->loadByProperties(['type' => $this->slider->id()]);
   // dpm($this->slider);
   // dpm($this->slideList);
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity.manager')
    );
  }


  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['select'] = array(
      '#type' => 'select',
      '#title' => $this->t('Select'),
      '#description' => $this->t(''),
      '#options' => array('s1' => $this->t('s1')),
      '#default_value' => isset($this->configuration['select']) ? $this->configuration['select'] : '',
      '#size' => 5,
      '#weight' => '0',
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['select'] = $form_state->getValue('select');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {

    if (empty($this->slideList)) {
      return;
    }
    if(is_array($this->slideList)) {
      $slides = [];
      foreach ($this->slideList as $id => $slide) {
        $slides[] = $this->viewBuilder->view($slide, 'full');
      }
      dpm($slides);
    }

    $build = [];
    $build['slider_block_select']['#markup'] = '<p>' . $this->configuration['select'] . '</p>';

    return $build;
  }

  /**
   * {@inheritdoc}
   */
/*
  public function blockAccess(AccountInterface $account, $return_as_object = FALSE) {
    return AccessResult::allowedIfHasPermission($account, 'administer blocks');
  }*/
}
