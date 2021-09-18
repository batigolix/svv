<?php

namespace Drupal\svv_dictionary\EventSubscriber;

use Drupal\migrate\Event\MigrateEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class PreImportEvent.
 *
 * @package Drupal\svv_dictionary\EventSubscriber
 */
class PreImportEvent implements EventSubscriberInterface {

  /**
   * @return mixed
   */
  public static function getSubscribedEvents() {
    $events[MigrateEvents::PRE_IMPORT][] = [
      'preImport',
      0,
    ];
    return $events;
  }

  /**
   * @param $event
   */
  public function preImport($event) {
    $path = 'public://svv_dictionary/';
    file_prepare_directory($path, FILE_CREATE_DIRECTORY);
    $config = \Drupal::service('config.factory')
      ->getEditable('svv_dictionary.config');
    $url = $config->get('url_to_google_docs_csv_file');
    $result = system_retrieve_file($url, 'public://svv_dictionary/dictionary.csv', FALSE, FILE_EXISTS_REPLACE);
  }

}
