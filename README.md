Battle.net SC2 API Wrapper
===========================

This is a quick (WIP) wrapper for the Battle.net API for SC2. It's likely best not to rely on it, as the API can
change very publicly, very quickly.

At current, there is a single supported function to get Grandmaster Information

Installation
-------------

```
composer require depotwarehouse/bnet-sc2-api
```

Testing
--------

Since this is primarily a wrapper for the Battle.net API, testing would be useless if we did not actually hit the API.
To that end, in order to test you must have an API key. Once you have that, copy `phpunit.xml.dist` to `phpunit.xml` and
fill in the `BNET_API_KEY` value in the `<php>` section.
