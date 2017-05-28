# PrestaShop Cache Clear

> Clear your PrestaShop 1.6 project cache in command line.

## Install

```
$ npm install --save prestashop-cache-clear
```

## Usage

```js
var psClear = require('prestashop-cache-clear');

// Clear PrestaShop cache
psClear.clear();
```

## Note
The module search for a `config/config.inc.php` file or a `web/config/config.inc.php` in the project.
