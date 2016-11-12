<?php

namespace Drupal\svv_tools\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class ChangeLanguage.
 *
 * @package Drupal\svv_tools\Controller
 */
class ChangeLanguage extends ControllerBase {
  /**
   * Change_language.
   *
   * @return string
   *   Return Hello string.
   */
  public function change_language() {

    $query = \Drupal::entityQuery('node')
//      ->condition('status', 1)
//      ->condition('type', 'book')
      ->sort('nid');
//      ->range(0, 9);
    $nids = $query->execute();
    $items = array();
    foreach ($nids as $nid) {
      $node = entity_load('node', $nid);

      $node->langcode->value = 'nl';
      $node->body->langcode->value = 'nl';
$node->save();

//      $parent = $book_manager->loadBookLink($query->get('parent'), TRUE);


      kint($node->toArray());
//      $node_view = entity_view($node, 'hero_teaser');
//      $items[] = array(
//        '#markup' => drupal_render($node_view),
//        '#wrapper_attributes' => array('class' => array('slide')),
//      );
    }


    kint($nids);


    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: change_language')
    ];
  }

}
