<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Barcode {

	public $data;
	
	public static function generate_barcode($id, $factor = 1, $backgroundColor = '#FFFFFF', $barHeight = 50, $fontSize = 10)
	{
		$code = self::create_barcode_code($id);
	
		$barcodeOptions = array('text' => $code, 'factor' => $factor, 'backgroundColor' => $backgroundColor, 'barHeight' => $barHeight, 'fontSize' => $fontSize);
	
		$rendererOptions = array('imageType' => 'gif');
	
		$image = Zend\Barcode\Barcode::factory('code39', 'image', $barcodeOptions, $rendererOptions)->render();
	
		return $image;
	}
	
	private static function create_barcode_code($id)
	{
		$code = str_pad($id, 10, '0', STR_PAD_LEFT);
		return $code;
	}

	public function generateBarcode() {

		return;
	}

	public function scanBarcode() {

		return;
	}
}


?>
