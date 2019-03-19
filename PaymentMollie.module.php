<?php namespace ProcessWire;
/**
 * PaymentMollie
 *
 * @author Bernhard Baumrock, 08.03.2019
 * @license Licensed under MIT
 */
class PaymentMollie extends WireData implements Module {

  public $api;

  /**
   * Initialize the module (optional)
   */
  public function init() {
    // load the mollie api client
    require_once("vendor/autoload.php");

    /*
    * Initialize the Mollie API library with your API key.
    *
    * See: https://www.mollie.com/dashboard/developers/api-keys
    */
    $this->api = new \Mollie\Api\MollieApiClient();
    $this->api->setApiKey($this->getApiKey());
  }

  /**
   * Get API Key based on mode setting
   *
   * @return void
   */
  private function getApiKey() {
    $key = '';

    if($this->mode === 0) $key = $this->api_test;
    elseif($this->mode === 1) $key = $this->api_live;
    else {
      if($this->config->PaymentMollieMode == 1) $key = $this->api_live;
      else $key = $this->api_test;
    }

    if(!$key) $this->error('You must provide an API Key for PaymentMollie!');

    return $key;
  }
}
