# Infiny API PHP SKD

A PHP SKD for intergration with the Infiny API. ([http://infiny.cloud](http://infiny.cloud)) by Epsilon Telecommunications Limited ([http://www.epsilontel.com](http://www.epsilontel.com)) 

## Quick Start
```php
<?php

require_once "vendor/autoload.php";

use Infiny\CloudLx as CloudLx;


$cloudLx = new CloudLx('<Client ID>', '<Client secret>');
$cloudLx->getServices();
```

## Installation

### With Composer

```
$ composer require epsilontelecommunications/infiny-client
```
```json
{
    "require": {
        "epsilontelecommunications/infiny-client": "^1.0"
    }
}
```

