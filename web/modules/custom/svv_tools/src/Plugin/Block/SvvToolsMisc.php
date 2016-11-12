<?php

/**
 * @file
 * Contains \Drupal\svv_tools\Plugin\Block\SvvToolsMisc.
 */

namespace Drupal\svv_tools\Plugin\Block;

use Drupal\Core\Block\BlockBase;
//use Drupal\node\Entity\Node;

/**
 * Provides a Google analytics block.
 *
 * @Block(
 *   id = "misc",
 *   subject = @Translation("Misc"),
 *   admin_label = @Translation("SVV tools: Misc")
 * )
 */
class SvvToolsMisc extends BlockBase {

  /**
   * Implements \Drupal\Core\Block\BlockBase::blockBuild().
   */
  public function build() {
    $build = array();
    $build['#markup'] = $this->t('Hello, World!');
    return $build;
  }
}
