<?php

namespace Drupal\mymodule\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines the admin configuration form for the calendar module.
 */
class MyModuleSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'mymodule.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'mymodule_admin_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildForm($form, $form_state);

    $config = $this->config('mymodule.settings');

    $form['mymodule_settings'] = [
      '#type' => 'details',
      '#title' => $this->t('My Module Settings'),
      '#open' => TRUE,
    ];

    $form['mymodule_settings']['test_module_param'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Test Module Param'),
      '#default_value' => $config->get('test_module_param'),
      '#description' => $this->t(""),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    \Drupal::configFactory()
      ->getEditable('mymodule.settings')
      ->set('test_module_param', $form_state->getValue('test_module_param'))
      //->set('test_module_param2', $form_state->getValue('test_module_param2'))
      ->save();
  }
}
