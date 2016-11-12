<?php

/**
 * @file
 * Contains \Drupal\svv_tools\Plugin\Block\SvvToolsPublished.
 */

namespace Drupal\svv_tools\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Example: configurable text string' block.
 *
 * @Block(
 *   id = "published",
 *   subject = @Translation("Published"),
 *   admin_label = @Translation("SVV tools: Published")
 * )
 */
class SvvToolsPublished extends BlockBase {

  /**
   * Implements \Drupal\Core\Block\BlockBase::blockBuild().
   */
  public function build() {
    $node = \Drupal::request()->attributes->get('node');
    if ($node) {
      $author = $node->getRevisionAuthor();
      $author_name = $author->getUserName();
      $update = \Drupal::service('date.formatter')
        ->format($node->getRevisionCreationTime());
      $message = t('Last updated on @date by @author', array(
        '@date' => $update,
        '@author' => $author_name,
      ));
      $build = array();
      $build['#markup'] = $message;
      return $build;
    }
  }
}
