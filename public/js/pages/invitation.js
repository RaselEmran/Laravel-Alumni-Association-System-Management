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
                     _componentSelect2Normal();
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
      function table(){
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
   }


$(document).on('click','#show',function(){
    $("#loader").show();
    var alumni =$(".alumni_id").val();
    var url =$(this).data('url');
    if (alumni =="") {
         swal("Please Select First!");
         $("#loader").hide();
    }
    else
    {
     $.ajax({
        url: url,
        type: "GET",
         dataType: 'html',
        data: {alumni:alumni} ,
        success: function (response) {
            console.log(response);
            $(".tile-body").html(response);
            table();
            $("#loader").hide();

           // You will get response from your PHP page (what you echo or print)
        },
        error: function(jqXHR, textStatus, errorThrown) {
            toastr.warning(textStatus, errorThrown);
             console.log(textStatus, errorThrown);
        }
       });
 
    }
});

$(document).on('change','#type',function(){
    var alumni_id =$("#alumni_id").val();
    var type =$(this).val();
    var url =$(this).data('url');
    if (alumni_id=="") {
        swal("Please Select First!");
    }
    else
    {
        if (type =='Custom') {
        $(".display").show();   
        $.ajax({
        url: url,
        type: "GET",
         dataType: 'html',
        data: {alumni_id:alumni_id} ,
        success: function (response) {
            $(".display").show(); 
            $("#member").append(response);
            console.log(response);
           

           // You will get response from your PHP page (what you echo or print)
        },
        error: function(jqXHR, textStatus, errorThrown) {
            toastr.warning(textStatus, errorThrown);
             console.log(textStatus, errorThrown);
        }
       });
        }
        else
        {
             $(".display").hide();   
        }
    }
})