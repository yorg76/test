#kohana-zend
===========

a simple module for using Zend framwork2 in kohana3

#Usage

## open the zend module
Kohana::modules(array(
        ...
        'zend'   => MODPATH.'zend',
    ));

## call

    $barcodeOptions = array('text' => 'KOHANA-ZEND', 'barHeight' => 30);
    $rendererOptions = array();

    \Zend\Barcode\Barcode::render(
	    'code39', 'image', $barcodeOptions, $rendererOptions
    );