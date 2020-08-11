TurtlePHP-JSCompressorPlugin
======================

### Sample plugin loading:
``` php
require_once APP . '/plugins/TurtlePHP-BasePlugin/Base.class.php';
require_once APP . '/plugins/TurtlePHP-JSCompressorPlugin/JSCompressor.class.php';
$path = APP . '/config/plugins/jSCompressor.inc.php';
TurtlePHP\Plugin\JSCompressor::setJSCompressorPath($path);
TurtlePHP\Plugin\JSCompressor::init();
```
