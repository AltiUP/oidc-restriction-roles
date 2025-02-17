<?php

namespace Drupal\oidc_restriction_roles\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure les paramètres pour le module OIDC Restriction Roles.
 */
class OidcRestrictionRolesSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'oidc_restriction_roles_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['oidc_restriction_roles.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('oidc_restriction_roles.settings');

    $form['role_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Nom du rôle'),
      '#default_value' => $config->get('role_name') ?: 'membres',
      '#description' => $this->t('Le rôle qui sera ajouté aux utilisateurs appartenant à la section autorisée.'),
      '#required' => TRUE,
    ];

    $form['section_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Numéro de section'),
      '#default_value' => $config->get('section_id') ?: '2050',
      '#description' => $this->t('L\'identifiant de la section autorisée. L\'utilisateur doit posséder ce numéro dans ses JWT pour obtenir le rôle.'),
      '#required' => TRUE,
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('oidc_restriction_roles.settings')
      ->set('role_name', $form_state->getValue('role_name'))
      ->set('section_id', $form_state->getValue('section_id'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}
