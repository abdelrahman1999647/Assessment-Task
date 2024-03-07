$(function(e) {
	//file export datatable
	var table = $('#example').DataTable({
		lengthChange: false,	
		buttons: [ 'copy', 'excel', 'print', 'colvis' ],
		responsive: false,
		language: {
			searchPlaceholder: 'بحث...',
			sSearch: '',
			lengthMenu: '_MENU_ ',
			"paginate": {

				"next":       "التالي",
				"previous":   "السابق"
			},
			"infoEmpty":      "عرض 0 إلى 0 من 0 البيانات",
			"emptyTable":     "لا توجد بيانات متاحة",
			"info":           "يتم عرض _START_ إلى _END_ من _TOTAL_ من الإدخالات",
			"infoFiltered":   "(filtered from _MAX_ total entries)",
		}
		
	});
	table.buttons().container()
	.appendTo( '#example_wrapper .col-md-6:eq()' );		
	
	$('#example1').DataTable({
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_',
		}
	});
	$('#example2').DataTable({
		responsive: true,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_',
		}
	});
	var table = $('#example-delete').DataTable({
		responsive: true,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_',
		}
	}); 
    $('#example-delete tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
 
    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );
	
	//Details display datatable

});