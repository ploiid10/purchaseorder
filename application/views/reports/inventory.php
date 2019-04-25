<div class="content-wrapper">
    <div class="row">
        <div class="col-md-10 offset-md-1 mt-5">
        <form class="form-inline">
            <label class="sr-only" for="inlineFormInputGroupUsername2">from</label>
            <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text">From</div>
            </div>
            <input type="date" class="dt form-control" id="dtStart" value="<?php echo date("Y-m-d");?>">
            </div>
            <label class="sr-only" for="inlineFormInputGroupUsername2">from</label>
            <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text">To</div>
            </div>
            <input type="date" class="dt form-control" id="dtEnd" value="<?php echo date("Y-m-d");?>">
            </div>
        </form>

                <table class="table table-bordered table-striped text-center">
                    <thead class="bg-primary">
                    <td>Date</td>
                    <td>Transaction</td>
                    <td>Ingredient</td>
                    <td>Quantity Added/Subtracted</td>
                    <td>Unit</td>
                    </thead>
                </table>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    var table = $('table').DataTable({
        "ajax" : {
         "url":'<?php echo base_url()?>reports/fetchInventoryHistory',
         "type": "POST",
         "data": function ( d ) {
          return $.extend( {}, d, {
            "dtStart": $("#dtStart").val(),
            "dtEnd": $("#dtEnd").val()
             });
         }
         },
        'dom' : 'Bfrtp',
        buttons: [
            {text : 'Copy', extend: 'copyHtml5'},{text : 'Excel',extend :  'excelHtml5', className : 'btn btn-success'}, {extend:'pdfHtml5', className : 'btn btn-danger'}
        ],
        'columns' : [
            {'data' : 'date'},
            {'data' : 'transaction'},
            {'data' : 'ingredient'},
            {'data' : 'quantity'},
            {'data' : 'unit'},
        ],
        rowsGroup: [1]
    });
    $(".dt").change(function(){
         table.ajax.reload();
     });
});
</script>