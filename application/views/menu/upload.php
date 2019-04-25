<div class="content-wrapper">
<br>
    <?php 
      if($this->session->flashdata('message')):?>
       
        <div class="alert alert-danger col-md-4 offset-md-4" role="alert">
        <?php  echo $this->session->flashdata('message');?>
        </div>
    <?php endif; ?>
    <br>
    <br>
    <?php if($this->session->flashdata('error')):?>
    <div class="col-md-6 offset-md-3 text-danger alert">
    <?php echo '<p>'.$this->session->flashdata('error').'</p>';?>
    </div>
    <?php    endif;?> 
    
     <div class="col-md-6 offset-md-3 text-danger">
      <form action="<?php echo base_url()?>menu/do_upload" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                      <div class="col-md-12">
                       <textarea type="text" class="form-control" name="description" placeholder="Description"></textarea>
                      </div>
                       </div>
                       <div class="form-group">
                       <div class="col-md-12">
                       <input type="text" class="form-control" name="price" placeholder="Price">
                      </div>
                       </div>
                       <div class="form-group">
                        <div class="col-md-12">
                          <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                       </div>
                       <div class="form-group">
                        <div class="col-md-12">
                          <input type="number" class="form-control" name="person" placeholder="Max number of Person">
                        </div>
                       </div>
                      <div class="form-group">
                        <div class="col-md-12">
                        <?php echo form_dropdown('category',$categories,'Please Choose',array('class' => 'form-control','id' => 'category'))?>
                          </div>  
                        </div>
                       <div class="form-group">
                         <div class="col-md-12">
                        <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image_file" name="image_file" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        <div class="col-md-12">
                      </div>
                      </div>
                       <div class="form-group mt-5">
                       <div class="col-md-12 offset-md-5">
                          <button type="submit" class="btn btn-primary">Submit</button>
                       </div>
                       </div>
                    </form>
    </div>
</div>
<script>

     $('#image_file').change(function(){
       image = $(this).val();
       $('.custom-file-label').html(image);
      });
      setTimeout(() => {
        $(".alert").slideUp(function() { 
           $(".alert").alert('close');
        });
        
      }, 3000);
</script>