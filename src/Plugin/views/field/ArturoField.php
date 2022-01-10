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
 * @ViewsField("arturo_field")
 */
class ArturoField extends FieldPluginBase {

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
    $options['nid'] = ['default' => '1'];
    $options['hide_alter_empty'] = ['default' => FALSE];
    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
    $form['nid'] = [
      '#type' => 'textfield',
      '#title' => 'nid',
      '#default_value' => $this->options['nid'],
      '#size' => 100,
      '#maxlength' => 255,
      '#description' => 'Introducir el nombre de machinfile del campo fecha a calcular'
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function render(ResultRow $values) {
    // Return a random text, here you can include your custom logic.
    // Include any namespace required to call the method required to generate
    // the desired output.
    $nid = $this->options['nid'];

    return [
      '#theme' => 'my_template',
      '#test_var' => $nid,
    ];
  }

}
