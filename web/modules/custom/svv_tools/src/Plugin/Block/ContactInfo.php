<?php

namespace Drupal\svv_tools\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'ContactInfo' block.
 *
 * @Block(
 *  id = "contact_info",
 *  admin_label = @Translation("SVV tools: Contact info"),
 * )
 */
class ContactInfo extends BlockBase {

  protected $default_markup = 'U kunt op verschillende manieren contact met ons opnemen.<h3>Adres</h3>Stichting Veldense Volkscultuur<br />Jan Verschurensingel 20<br />5941 CK Velden<h3>Telefoon</h3>077-4721586<h3>E-mail</h3>h.derix@ziggo.nl<h3>Contactformulier</h3>';

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return array(
      'label' => t("Contact info"),
      'contact_info_markup_string' => $this->default_markup,
      'cache' => array(
        'max_age' => 3600,
        'contexts' => array(
          'cache_context.user.roles',
        ),
      ),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['contact_info_markup_string_text'] = array(
      '#type' => 'textarea',
      '#title' => $this->t('Contact info markup'),
      '#description' => $this->t('This text will appear in the contact info.'),
      '#default_value' => $this->configuration['contact_info_markup_string'],
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['contact_info_markup_string']
      = $form_state->getValue('contact_info_markup_string_text');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    return array(
      '#type' => 'markup',
      '#markup' => $this->configuration['contact_info_markup_string'],
    );
  }

}
