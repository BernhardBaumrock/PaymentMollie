<?php
/**
 * PaymentMollie Config
 *
 * @author Bernhard Baumrock, 08.03.2019
 * @license Licensed under MIT
 */

$modes = [
  0 => 'TEST',
  1 => 'LIVE',
];

$config = [
  'mode' => [
    'type' => 'radios',
    'label' => 'Use LIVE or TEST API Key?',
    'options' => array(
      0 => 'TEST',
      1 => 'LIVE',
      2 => 'Config-Setting (current: ' . $modes[(int)$this->config->PaymentMollieMode] . ')',
    ),
    'value' => 0,
    'notes' => 'If you use the config setting, set $config->PaymentMollieMode to 0 = TEST, or 1 = LIVE',
    'required' => 1,
  ],[
    'type' => 'fieldset',
    'label' => 'API-Keys',
    'notes' => 'Go to [https://www.mollie.com/dashboard/developers/api-keys](https://www.mollie.com/dashboard/developers/api-keys) to retrieve your key',
    'children' => [
      'api_live' => [
        'type' => 'text',
        'label' => 'LIVE',
        'required' => 1,
        'columnWidth' => 50,
      ],
      'api_test' => [
        'type' => 'text',
        'label' => 'TEST',
        'required' => 1,
        'columnWidth' => 50,
      ],
    ],
  ],[
    'type' => 'markup',
    'label' => 'Usage',
    'value' => 'See <a href="https://docs.mollie.com/reference/v2/">https://docs.mollie.com/reference/v2/</a> for the official docs!'
      .' You can access the API like this (using <a href="https://adrianbj.github.io/TracyDebugger/">TracyDebugger</a> here):<br><br><img src="https://i.imgur.com/FOCE0SW.png">',
  ],
];
