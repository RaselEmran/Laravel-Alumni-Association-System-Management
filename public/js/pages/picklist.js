/* ------------------------------------------------------------------------------
 *
 *  # Select extension for Datatables
 *
 *  Demo JS code for datatable_extension_select.html page
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------
// var emran="";
var DatatableSelect = function() {


    //
    // Setup module components
    //

    // Basic Datatable examples
    var _componentDatatableSelect = function() {
        if (!$().DataTable) {
            console.warn('Warning - datatables.min.js is not loaded.');
            return;
        }

        // Setting datatable defaults

           $('.content_managment_table').DataTable({
             responsive: {
                details: {
                    type: 'column',
                    target: 'tr'
                }
             },
             dom: 'Bfrtip',
                buttons: [
                    { extend: 'copy', className: 'btn btn-primary glyphicon glyphicon-duplicate' },
                    { extend: 'csv', className: 'btn btn-primary glyphicon glyphicon-save-file' },
                    { extend: 'excel', className: 'btn btn-primary glyphicon glyphicon-list-alt' },
                    { extend: 'pdf', className: 'btn btn-primary glyphicon glyphicon-file' },
                    { extend: 'print', className: 'btn btn-primary glyphicon glyphicon-print' }
                ],

              order: [0, 'asc']
          
            });


    };

        var _componentRemoteModalLoad = function() {
        $(document).on('click', '#content_managment', function(e) {
            e.preventDefault();
            //open modal
            $('#modal_remote').modal('toggle');
            // it will get action url
            var url = $(this).data('url');
            // leave it blank before ajax call
            $('.modal-body').html('');
            // load ajax loader
            $('#modal-loader').show();
            $.ajax({
                    url: url,
                    type: 'Get',
                    dataType: 'html'
                })
                .done(function(data) {
                    $('.modal-body').html(data).fadeIn(); // load response
                    $('#modal-loader').hide();
                    $('#branch_no').focus();
                     _componentDropFile();
                    _modalFormValidation();
                })
                .fail(function(data) {
                    $('.modal-body').html('<span style="color:red; font-weight: bold;"> Something Went Wrong. Please Try again later.......</span>');
                    $('#modal-loader').hide();
                });
        });
    };



    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _componentDatatableSelect();
            _componentRemoteModalLoad();
            _componentSelect2Normal();
            _componentDatePicker();
            _formValidation();
            _classformValidation();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    DatatableSelect.init();
});