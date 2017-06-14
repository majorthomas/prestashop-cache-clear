# PrestaShop Cache Clear
[![npm version](https://badge.fury.io/js/prestashop-cache-clear.svg)](https://badge.fury.io/js/prestashop-cache-clear)

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

## Options

### onComplete
```js
psClear.clear({
  onComplete: function () {
    // Called after cache cleared.
  }
});
```

### onError
```js
psClear.clear({
  onError: function () {
    // Called after an error.
  }
});
```

## Note
The module search for a `config/config.inc.php` file or a `web/config/config.inc.php` in the project.
