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
 * @ViewsField("edad_views_field")
 */
class EdadViewsField extends FieldPluginBase {

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
    $options['fecha_nacimiento'] = ['default' => ''];
    $options['hide_alter_empty'] = ['default' => FALSE];
    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
    $form['fecha_nacimiento'] = [
      '#type' => 'textfield',
      '#title' => 'Campo de fecha de nacimiento',
      '#default_value' => $this->options['fecha_nacimiento'],
      '#size' => 100,
      '#maxlength' => 255,
      '#description' => 'Introducir el nombre de machinfile del campo fecha a calcular'
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function render(ResultRow $values) {
    $fecha = $this->options['fecha_nacimiento'];
    $field_fecha = $this->view->field[$fecha]->original_value;
    return $this->calculaedad($field_fecha);
    // return $fecha;
  }
  public function calculaedad($fechanacimiento){
    list($ano,$mes,$dia) = explode("-",$fechanacimiento);
    $ano_diferencia  = date("Y") - $ano;
    $mes_diferencia = date("m") - $mes;
    $dia_diferencia   = date("d") - $dia;
    // if ($dia_diferencia < 0 || $mes_diferencia < 0)
    //   $ano_diferencia--;
    return $ano_diferencia;
  }

}
