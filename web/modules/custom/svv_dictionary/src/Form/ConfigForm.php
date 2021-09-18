<?php

namespace Drupal\svv_dictionary\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configuration form for svv dictionary.
 */
class ConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'svv_dictionary.config',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'config_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('svv_dictionary.config');
    $form['url_to_google_docs_csv_file'] = [
      '#type' => 'url',
      '#title' => $this->t('URL to google docs CSV file'),
      '#description' => $this->t('Comma separated values file that holds the dictionary.'),
      '#default_value' => $config->get('url_to_google_docs_csv_file'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('svv_dictionary.config')
      ->set('url_to_google_docs_csv_file', $form_state->getValue('url_to_google_docs_csv_file'))
      ->save();
  }

}
