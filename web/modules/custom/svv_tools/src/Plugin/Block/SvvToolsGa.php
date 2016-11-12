<?php

/**
 * @file
 * Contains \Drupal\svv_tools\Plugin\Block\SvvToolsGa.
 */

namespace Drupal\svv_tools\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a Google analytics block.
 *
 * @Block(
 *   id = "ga",
 *   subject = @Translation("Google analytics"),
 *   admin_label = @Translation("SVV tools: Google analytics")
 * )
 */
class SvvToolsGa extends BlockBase {

  /**
   * Implements \Drupal\Core\Block\BlockBase::blockBuild().
   */
  public function build() {
    $build = array();
    $build['#attached']['library'][] = 'svv_tools/ga';
    return $build;
  }
}
