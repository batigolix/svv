<?php

namespace Drupal\svv_dictionary\Plugin\migrate\process;

use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\Row;

/**
 * Returns first character from string.
 *
 * Example:
 *
 * @code
 * process:
 *   field_your_field_name:
 *     -
 *       plugin: first_character
 *       source: some_source_value
 * @endcode
 *
 * @see \Drupal\migrate\Plugin\MigrateProcessInterface
 *
 * @MigrateProcessPlugin(
 *   id = "first_character"
 * )
 */
class FirstCharacter extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {

    // Fetches first character from value.
    if (is_string($value)) {
      if (ctype_alpha($value[0])) {
        return $value[0];
      }
    }
    return NULL;
  }

}
