<div class="content wrapper">
<div class="row">

<div class="col-md-4 offset-md-5 mt-5">
        <form action="<?php echo base_url()?>ingredients/update" method="post">
            <input type="hidden" name="id" value='<?php echo $id?>'>
            <div class="row">
                <div class="col">
                <label>Ingredient Name</label>
                <input type="text" id="name" value="<?php echo $name?>" name="name" class="form-control" placeholder="Category Description">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                <label>Ingredient Quantity</label>
                    <input type="number" class="form-control" value=<?php echo $quantity?> name="quantity">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                <label>Ingredient Unit</label>
                <?php 
                    $data = array(
                        'pcs' => 'pcs',
                        'kg' => 'kg',
                    );
                echo form_dropdown('unit',$data,$unit,array('class' => 'form-control','id' => 'unit'))?>
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
</div>