<?php

/**
 * @file
 * Contains \Drupal\login_redirect\Form\LoginRedirectAdminForm.
 */

namespace Drupal\login_redirect\Form;

use Drupal\Core\Form\ConfigFormBase;

/**
 * Configure Login Redirect settings for this site.
 */
class LoginRedirectAdminForm extends ConfigFormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'login_redirect_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, array &$form_state) {
    $config = $this->config('login_redirect.parameters');

    $form['status'] = array(
      '#type' => 'radios',
      '#options' => array(0 => t('Disabled'), 1 => t('Enabled')),
      '#title' => t('Module status'),
      '#default_value' => $config->get('status'),
      '#description' => t('Should the module be enabled?'),
    );

    $form['parameter_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Parameter Name'),
      '#default_value' => $config->get('parameter_name'),
      '#maxlength' => 255,
      '#description' => t('Enter user defined query parameter name same as we have q in drupal core. For example if the parameter name is set to "destination", then you would visit user/login&destination=(redirect destination).'),
    );

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, array &$form_state) {
    $config = $this->config('login_redirect.parameters')
      ->set('status', $form_state['values']['status'])
      ->set('parameter_name', $form_state['values']['parameter_name']);

    $config->save();

    parent::submitForm($form, $form_state);
  }

}