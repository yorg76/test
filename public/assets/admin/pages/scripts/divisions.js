var TableDivisions = function () {
	var id=0;
	
    var initPickers = function () {
        //init date pickers
        $('.date-picker').datepicker({
            rtl: Metronic.isRTL(),
            autoclose: true
        });
    }
    
    var handleTable = function () {

        var table = new Datatable({
        	
        	"language": {
                "lengthMenu": " _MENU_ wierszy",
                "loadingMessage": 'Trwa ładowanie...'
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
              	 "searchable": true,
                 "targets": [0]
            }],
        });

        var oTable = table.init({
        	src: $("#customer_divisions_list"),
            onSuccess: function (grid) {
                // execute some code after table records loaded
            },
            onError: function (grid) {
            },
            
            dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options 

                // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
                // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js). 
                // So when dropdowns used the scrollable div should be removed. 
                //"dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",
                
                "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
                "searchable": true, 
                "lengthMenu": [
                    [10, 20, 50, 100, 150, -1],
                    [10, 20, 50, 100, 150, "Wszystkie"] // change per page values here
                ],
                "pageLength": 10, // default record count per page
                
                "ajax": {
                	"url": "/ajax/divisions_list", // ajax source
                },
                "order": [
                    [0, "asc"]
                ] // set first column as a default sort by asc
            }        	
     
        });      
    }

    return {

        //main function to initiate the module
        init: function () {
        	initPickers();
            handleTable();
        }

    };

}();
