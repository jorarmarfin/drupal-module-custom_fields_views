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
 * @ViewsField("count_topyc_forum_field")
 */
class CountTopycForumField extends FieldPluginBase {

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

    $options['hide_alter_empty'] = ['default' => FALSE];
    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function render(ResultRow $values) {

    $tid = $this->view->field['tid']->original_value;
    // $query = \Drupal::entityQuery('node')->condition('type', 'forum');
    // $query->condition('taxonomy_forums', [$tid], 'IN');
    // $query->condition('parent', $tid);


    $query = \Drupal::entityQuery('taxonomy_term')
      ->condition('parent', $tid);
    $count = $query->count()->execute();

    // $children=Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadChildren($tid);


    return $count;
  }

}
