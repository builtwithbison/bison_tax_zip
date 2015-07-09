# Tax Rate Zip Lookup
> Look up tax rates for a zip code using the Avalara API.

**United States only.**

## Installation

This requires Bison 1.5.1.

1. Copy the `api` and `core` files into `_add-ons/bison_tax_zip/`
2. Copy `bison_tax_zip.yaml` into `_config/add-ons/bison_tax_zip/` and enter your API key from Avalara. (see below)
3. In `bison.yaml`, set `tax_rate` to `zip`.
4. In `bison.yaml`, set `taxable_states` to an array of states you want to charge tax in. eg. `[FL, CA]`

To get your API key, visit http://taxratesapi.avalara.com/ and register for an account.