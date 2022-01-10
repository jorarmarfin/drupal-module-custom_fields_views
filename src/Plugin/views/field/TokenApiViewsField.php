<?php

namespace Drupal\custom_field_views\Plugin\views\field;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\Random;
use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\views\ResultRow;

/**
 * A handler to provide a field that is completely custom by the administrator.
 *
 * @ingroup views_field_handlers
 *
 * @ViewsField("token_api_views_field")
 */
class TokenApiViewsField extends FieldPluginBase {

  /**
   * {@inheritdoc}
   */
  public function usesGroupBy() {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function query() {
    // Do nothing -- to override the parent query.
  }

  /**
   * {@inheritdoc}
   */
  protected function defineOptions() {
    $options = parent::defineOptions();

    $options['campo_encriptar'] = ['default' => FALSE];
    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
    $form['campo_encriptar'] = [
      '#type' => 'textfield',
      '#title' => 'Campo que desea encriptar',
      '#default_value' => $this->options['campo_encriptar'],
      '#size' => 100,
      '#maxlength' => 255,
      '#description' => 'Introducir el nombre de maquina que desea encriptar'
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function render(ResultRow $values) {
    $campo = $this->options['campo_encriptar'];
    $campo_encriptado = $this->view->field[$campo]->original_value;

    return md5($campo_encriptado);
  }

}
