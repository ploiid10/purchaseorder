<div class="content-wrapper">
    <div class="row">
    <button class="btn btn-success ml-3 mt-2" data-toggle="modal" data-target="#IngredientModal">Add Ingredient</button>
        <div class="col-md-10 offset-md-1 mt-5">
                <table class="table table-bordered table-striped">
                    <thead class="bg-primary">
                    <td>Ingredient</td>
                    <td>Quantity</td>
                    <td>Unit</td>
                    <td>Actions</td>
                    </thead>
                </table>
        </div>
    </div>
</div>
<div class="modal fade" id="IngredientModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ingredient Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <label for="name">Ingredient Name</label>
                <input type="text" class="form-control"  id="name" aria-describedby="ingredientHelp" required>
                <small id="ingredientHelp" class="form-text text-muted">Please clearly indicate ingredient name</small>
            </div>
            <div class="form-group">
                <label for="password">Unit</label>
                <?php 
                    $data = array(
                        'pcs' => 'pcs',
                        'kg' => 'kg',
                    );
                echo form_dropdown('unit',$data,'Please Choose',array('class' => 'form-control','id' => 'unit'))?>
            </div>
         </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="save">Save</button>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    var table = $('table').DataTable({
        "ajax" : '<?php echo base_url()?>inventory/fetchInventory',
        'columns' : [
            {'data' : 'ingredient'},
            {'data' : 'quantity'},
            {'data' : 'unit'},
            { 'data' : 'id', searchable : false, orderable : false,
                "render": function ( data, type, full, meta ) {
                  return '<a class="btn btn-warning btn-sm" href="<?php echo base_url()?>ingredients/'+data+'/edit">Edit</a>';
            }}
        ]
    });
   $('#save').click(function(){
        const data = {
            name : $('#name').val(),
            unit : $('#unit').val()
        }
        $.ajax({
            type : 'POST',
            data : data,
            url : '<?php echo base_url()?>ingredients/save',
            success : function(response){
                table.ajax.reload();
                $('#IngredientModal').modal('hide');
                $('#name').val('');
            }
        });
   });
  });
</script>