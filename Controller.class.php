<?php

    // Namespace overhead
    namespace Controller;

    /**
     * JSCompressor
     * 
     * Provides two controller actions which can be useful for dynamically
     * generating batches based on HTTP requests.
     * 
     * Very important to note that if this is called via something like a build
     * script which runs under a different user:group combination as HTTP
     * requests do, you can run into permission issues when attempting access
     * and/or overwrite existing batch files.
     * 
     * @extends \TurtlePHP\Controller
     * @final
     */
    final class JSCompressor extends \TurtlePHP\Controller
    {
        /**
         * actionCompress
         * 
         * @access  public
         * @param   string $batchKey
         * @return  void
         */
        public function actionCompress(string $batchKey)
        {
            $path = \TurtlePHP\Plugin\JSCompressor::getBatchPath($batchKey);
            $path = WEBROOT . ($path);
            $content = file_get_contents($path);
            $this->_pass('response', $content);
            header('Content-type: text/javascript');
        }

        /**
         * actionCompressAll
         * 
         * @access  public
         * @return  void
         */
        public function actionCompressAll()
        {
            $config = \TurtlePHP\Plugin\Config::get('TurtlePHP-JSCompressorPlugin');
            $batches = $config['batches'];
            $paths = array();
            foreach ($batches as $key => $settings) {
                $paths[$key] = \TurtlePHP\Plugin\JSCompressor::getBatchPath($key);
            }
            $success = true;
            $data = compact('paths');
            $response = compact('success', 'data');
            $encodedResponse = json_encode($response);
            $this->_pass('response', $encodedResponse);
        }
    }
