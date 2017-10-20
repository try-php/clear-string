# clear-string
> string utility package for clearing special characters

[![Build Status](https://travis-ci.org/try-php/clear-string.svg?branch=master)](https://travis-ci.org/try-php/clear-string)


## Install

```bash
$ composer require try/clear-string
```

## Usage

```php
<?php
require_once '/path/to/autoload.php';

use TryPhp\stripControlCharacters;

$clearedString = stripControlCharacters("Some Special\nMultiline String"); 
echo $clearedString; // will output "Some Special Multiline String";
```

## API

### Functions

#### `stripControlCharacters($contents)`

Function to strip control characters from a string. The function will replace `\n` and `\t` with a simple whitespace and remove any other control character (`\0`, `\a`, `\b`, `\v`, `\f`,`\r`, `\e`). So it cleans up the output and allows a more precise text comparison.

##### Arguments

| Argument | Type | Description | 
|---|---|---|
| $contents | `string` | The string that will be cleared. |

#### `stripColorCharacters($contents)`

Function to remove escape characters (`\e`) with following color code (e.g. `\e[33m`) from a string.

##### Arguments

| Argument | Type | Description | 
|---|---|---|
| $contents | `string` | The string that will be cleared. |

## License

GPL-2.0 © Willi Eßer