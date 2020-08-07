TurtlePHP-JSCompressorPlugin
======================

### Sample plugin loading:
``` php
require_once APP . '/plugins/TurtlePHP-BasePlugin/Base.class.php';
require_once APP . '/plugins/TurtlePHP-JSCompressorPlugin/JSCompressor.class.php';
$path = APP . '/config/plugins/jSCompressor.inc.php';
Plugin\JSCompressor::setJSCompressorPath($path);
Plugin\JSCompressor::init();
```
