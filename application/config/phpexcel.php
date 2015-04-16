<?php

defined('SYSPATH') or die('No direct script access.');

return array(
    'header' => array(
        'font' => array(
            'bold' => true,
            'color'=>array('argb' => 'FF000000'),
        ),

        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
        ),

        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
            'rotation' => 90,
            'startcolor' => array('argb' => 'FFFFFFFF'),
            'endcolor' => array('argb' => 'FFFFFFFF')
        )
    ),

         'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array('argb' => 'FF000000'),
            ),
        )
);
