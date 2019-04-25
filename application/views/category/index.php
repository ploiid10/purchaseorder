<div class="content-wrapper">
 <!-- Button trigger modal -->
    <br>
  
    <div class="col-md-3 offset-md-1">
      <?php if($this->session->flashdata('msg')):?>
      <p><strong  class="text-danger"><?php echo $this->session->flashdata('msg');?></strong></p>
      <?php endif;?>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#category-modal">
        Add Category
    </button>
    </div>
    <div class="col-md-10 offset-md-1 mt-5">
            <table class="table table-bordered table-striped text-center">
                <thead class="bg-primary">
                        <tr>
                            <td>Id</td>
                            <td>Category</td>
                            <td>Action</td>
                        </tr>
                </thead>
                <tbody>
                  
                </tbody>
        </table>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="category-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url()?>category/insert">
            <div class="row">
                <div class="col">
                <input type="text" id="description" name="description" class="form-control" placeholder="Category Description">
                </div>
            </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
 var table = $('table').DataTable({
            'order' : [[0, 'desc']],
            'ajax' : '<?php echo base_url()?>category/list',
            'columns' : [
              { 'data' : 'id', visible : false},
              { 'data' : 'name'},
              { 'data' : 'id', searchable : false, orderable : false,
                "render": function ( data, type, full, meta ) {
                  return '<a class="btn btn-warning btn-sm" href="<?php echo base_url()?>category/edit/'+data+'">Edit</a>';
            }}
            ]
            });
 $('.btn-secondary').click(function(){
     $('form').trigger('reset');
});
});
    </script>