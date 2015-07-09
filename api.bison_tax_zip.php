<?php

class API_bison_tax_zip extends API
{
    public function getTaxRate()
    {
        $zip    = $this->core->getZip();
        $state = $this->core->getState();
        $states = $this->core->getTaxableStates();

        // If there's no state or zip entered yet, we can't know the
        // tax, so it's zero. Also, if the customer's state isn't
        // a taxable one, it'll be zero.
        if (! $zip || ! $state || ! in_array($state, $states)) {
            return 0;
        }

        // Does the zip already exist in the cache? We already made the
        // request and don't need to hit the API again. Wonderful!
        if ($this->cache->exists($zip)) {
            return $this->cache->get($zip);
        }

        $rate = $this->core->getRateFromAPI($zip);

        $this->cache->put($zip, $rate);

        return $rate;
    }
}
