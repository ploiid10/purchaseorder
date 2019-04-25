<div class="content-wrapper">
<br>
    
    <br>
    <br>
    
     <div class="col-md-6 offset-md-3 text-danger">
     <img class="offset-md-3 mb-2" src="<?php echo $menu['imagePath']?>" alt="No Photo" width="200" height="200">
                  
      <form action="<?php echo base_url()?>menu/upload_edit" method="post" enctype="multipart/form-data">
                   <input type="hidden" name="id" value="<?php echo $menu['id']?>">
                      <div class="form-group">
                      <div class="col-md-12">
                       <input type="text" class="form-control" value="<?php echo $menu['description']?>" name="description" placeholder="Description">
                      </div>
                       </div>
                       <div class="form-group">
                       <div class="col-md-12">
                        <input type="text" class="form-control" name="name" value="<?php echo $menu['name']?>">
                       </div>
                       </div>
                       <div class="form-group">
                       <div class="col-md-12">
                       <input type="text" class="form-control" value="<?php echo $menu['price']?>" name="price" placeholder="Price">
                      </div>
                       </div>
                       <div class="form-group">
                       <div class="col-md-12">
                        <input type="number" class="form-control" value=<?php echo $menu['person']?> name="person" placeholder="Max number of People">
                       </div>
                       </div>
                      <div class="form-group">
                        <div class="col-md-12">
                        <?php echo form_dropdown('category',$menu['categories'],$menu['category'],array('class' => 'form-control','id' => 'category'))?>
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
      
</script>