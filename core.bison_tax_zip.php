<?php

class Core_bison_tax_zip extends Core
{
    public function getZip()
    {
        $customer = $this->addon->api('bison')->getCustomerInfo();

        $zip = array_get($customer, 'billing_zip');

        return ($zip == '') ? null : $zip;
    }

    public function getState()
    {
        $customer = $this->addon->api('bison')->getCustomerInfo();

        $state = array_get($customer, 'billing_state');

        return ($state == '') ? null : $state;
    }

    public function getTaxableStates()
    {
        return array_get($this->addon->api('bison')->getBisonConfig(), 'taxable_states');
    }

    public function getRateFromAPI($zip)
    {
        $api_key = $this->config['api_key'];

        $query = http_build_query(array(
            'country' => 'usa',
            'postal' => $zip,
            'apikey' => $api_key
        ));

        $url = 'https://taxrates.api.avalara.com/postal?' . $query;

        $response = json_decode(file_get_contents($url));

        return $response->totalRate;
    }
}
