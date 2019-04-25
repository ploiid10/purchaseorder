<div class="content-wrapper">
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('reports')?>">Date Range</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" >Per Transaction</a>
  </li>
</ul>

<div class="tab-content">
  <div class="tab-pane container active" >
    
  <br>


 </div>
 <div class="col-md-12 mt-3">
            <table class="table table-bordered text-center">
                <thead class="bg-primary">
                    <tr>
                        <td>Date</td>
                        <td>Transaction Id</td>
                        <td>Description</td>
                        <td>Quantity</td>
                        <td>Price</td>

                    </tr>
                </thead>
                <tbody></tbody>
              <tfoot>
                <tr>
                  <td></td>
                  <td></td><td></td><td></td>
                  <td><h4 id="sum"></h4></td>
                </tr>
              </tfoot>
            </table>
        </div>

</div>
   
</div>
<script>
   let table = $('table').DataTable({
  'ajax' : '<?php echo base_url()?>reports/per_transaction',
  drawCallback: function () {
             var api = this.api();
             var d = api.column( 4, {page:'current'} ).data().sum();
             $('#sum').html(d);
           },
  'columns' : [
    {'data' : 'dateOrdered',searchable : false,orderable : false},
    {'data' : 'transaction_id'},
    {'data' : 'description'},
    {'data' : 'quantity'},
    {'data' : 'price'}
  ],
  'dom' : 'Bfrtp',
  buttons: [
            {text : 'Copy', extend: 'copyHtml5'},{text : 'Excel',extend :  'excelHtml5', className : 'btn btn-success'}, {extend:'pdfHtml5', className : 'btn btn-danger'}
        ]


});
</script>