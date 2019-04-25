<div class="content-wrapper">
  <div class="row">
        <div class="col-md-11 mt-3 ml-5">
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
            <table class="table table-bordered text-center">
                <thead class="bg-primary">
                    <tr>
                        <td>Date</td>
                        <td>Transaction Id</td>
                        <td>Customer</td>
                        <td>Amount</td>
                    </tr>
                </thead>
                <tbody></tbody>
              <tfoot>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><h4 id="sum"></h4></td>
                </tr>
              </tfoot>
            </table>
        </div>
    
</div>
  </div>

</div>
   
</div>
<script>
$(document).ready(function(){
  var table = $('table').DataTable({
      "ajax" : {
         "url":'<?php echo base_url()?>reports/summaryPurchasing',
         "type": "GET",
         "data": function ( d ) {
          return $.extend( {}, d, {
            "dtStart": $("#dtStart").val(),
            "dtEnd": $("#dtEnd").val()
             });
         }
         },
         "pageLength": 10,
      drawCallback: function () {
             var api = this.api();
             var d = api.column( 3, {page:'current'} ).data().sum();
              $('#sum').html(d.toFixed(2));
           },
      'columns' : [
        {'data' : 'date',searchable : false,orderable : false},
        { 'data' : 'transaction_id', searchable : false, orderable : false,
                "render": function ( data, type, full, meta ) {
                  return '<a  target="_blank" href="<?php echo base_url()?>purchasing/details/'+data+'">'+data+'</a>';
        }},
        {'data' : 'customer'},
        {'data' : 'amount'}
        ],
      'dom' : 'Bfrtp',
      buttons: [
                {text : 'Copy', extend: 'copyHtml5'},{text : 'Excel',extend :  'excelHtml5', className : 'btn btn-success'}, {extend:'pdfHtml5', className : 'btn btn-danger'}
            ]

    });
    $(".dt").change(function(){
          table.ajax.reload();  
      });
});
</script>