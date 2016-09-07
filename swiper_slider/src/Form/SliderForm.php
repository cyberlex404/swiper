<?php

namespace Drupal\swiper_slider\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class SliderForm.
 *
 * @package Drupal\swiper_slider\Form
 */
class SliderForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $slider = $this->entity;
    $form['label'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $slider->label(),
      '#description' => $this->t("Label for the Slider."),
      '#required' => TRUE,
    );

    $form['id'] = array(
      '#type' => 'machine_name',
      '#default_value' => $slider->id(),
      '#machine_name' => array(
        'exists' => '\Drupal\swiper_slider\Entity\Slider::load',
      ),
      '#disabled' => !$slider->isNew(),
    );

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $slider = $this->entity;
    $status = $slider->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Slider.', [
          '%label' => $slider->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Slider.', [
          '%label' => $slider->label(),
        ]));
    }
    $form_state->setRedirectUrl($slider->urlInfo('collection'));
  }

}
