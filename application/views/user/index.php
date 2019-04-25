<div class="content-wrapper">
        <br>
        <div class="col-md-12">
        <button class="btn btn-success" data-toggle="modal" data-target="#UserModal">Add User</button>
        </div>
        <br>
    <div class="col-md-12">
        <table class="table table-striped">
                <thead class="bg-primary">
                        <tr>
                        <td>Email</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        </tr>
                </thead>
                <tbody>
                </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="UserModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">User Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" placeholder="First Name">
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" placeholder="Last Name">
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
            'ajax' : '<?php echo base_url()?>user/fetchAll',
            'columns' : [
                {'data' : 'email'},
                {'data' : 'firstname'} ,               
                {'data' : 'lastname'}    
            ]
     });
  $('#save').click(function(){
     var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
     var password = $('#password').val();
     var email = $('#email').val();
     var data = {firstname : firstname, password : password, lastname : lastname, email : email};
    console.log(data);
     $.ajax({
            url : "<?php echo base_url()?>user/save",
            type : "POST",
            data : data,
            success : function(response){
                $('form').trigger("reset");
               $('#UserModal').modal('hide');
               table.ajax.reload();
            }
    });
  });
});
</script>