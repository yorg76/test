<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <style>
	
	@media print, screen {
		#Header, #Footer { display: none !important; visibility:hidden;}
		.header, .footer { display: none !important; visibility:hidden;}
		
		@page{margin:0px auto;}
		
	    body {
	        width: 100mm;
	        height: 40mm;
	        margin: .0in .2175in;
	        }
	    .label{
	        /* Avery 5160 labels -- CSS and HTML by MM at Boulder Information Services */
	        width: 100mm; /* plus .6 inches from padding */
	        height: 40mm; /* plus .125 inches from padding */
	        padding: .125in .3in 0;
	        margin-top:.125in;
	        margin-right: .125in; /* the gutter */
	        float: left;
	
	        text-align: center;
	        overflow: hidden;
	
	        outline: 1px dotted; /* outline doesn't occupy space like border does */
	        }
	    .page-break  {
	        clear: left;
	        display:block;
	        page-break-after:always;
	        }
	        
	    img {
	    	width: 100mm; /* plus .6 inches from padding */
	        height: 40mm;
	        padding-bottom: 10px;
	    }
    }
    </style>

</head>
<body>

<?php foreach($boxes as $box):?>
<input type="hidden" class="barcode" value="<?php echo $box->id;?>" />
<div class="label"><img src="/barcode/get_label/<?php echo $box->id;?>" /></div>
<div class="page-break"></div>
<?php endforeach;?>

</body>
</html>