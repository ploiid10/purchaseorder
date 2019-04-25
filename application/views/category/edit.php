<div class="content wrapper">
<br>
<br>
    <div class="col-md-4 offset-md-5">
        <?php if($this->session->flashdata('msg')):?>
            <p><strong class="text-danger"><?php $this->session->flashdata('msg')?></strong></p>
        <?php endif;?>
        <form action="<?php echo base_url()?>category/update/<?php echo $id?>" method="post">
            <div class="row">
                <div class="col">
                <input type="text" id="description" value="<?php echo $name?>" name="description" class="form-control" placeholder="Category Description">
                </div>
            </div>
            <div class="form-group mt-3 float-right">
              <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </div>
        </form>
    <div>
</div>