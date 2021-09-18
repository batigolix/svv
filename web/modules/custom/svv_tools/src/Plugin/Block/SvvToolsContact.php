<?php

namespace Drupal\svv_tools\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Example: configurable text string' block.
 *
 * @Block(
 *   id = "svv_tools_contact",
 *   subject = @Translation("Contact"),
 *   admin_label = @Translation("SVV tools: Contact"),
 * )
 */
class SvvToolsContact extends BlockBase {

  protected $default_markup = '<p>Stichting Veldense Volkscultuur - Jan Verschurensingel 20, 5941 CK Velden, 077-4721586, volkscultuur.velden@gmail.com</p>';

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'label' => t("Contact"),
      'contact_markup_string' => $this->default_markup,
      'cache' => [
        'max_age' => 3600,
        'contexts' => [
          'cache_context.user.roles',
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['contact_markup_string_text'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Contact markup'),
      '#description' => $this->t('This text will appear in the example block.'),
      '#default_value' => $this->configuration['contact_markup_string'],
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['contact_markup_string']
      = $form_state->getValue('contact_markup_string_text');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#type' => 'markup',
      '#markup' => $this->configuration['contact_markup_string'],
    ];
  }

}
