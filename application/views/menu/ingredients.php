<div class="content-wrapper">
    <div class="row">
    <button class="btn btn-success ml-3 mt-2" data-toggle="modal" data-target="#IngredientModal">Add Ingredient</button>
        <div class="col-md-12 mt-5">
            <div class="col-md-4 offset-md-3">
                <?php if(count($ingredients) > 0):?>
                <table class="table table-hover table-bordered table-striped text-center">
                <thead class="bg-primary">
                    <tr>
                    <td>Ingredient</td>
                    <td>Quantity to Use</td>
                    </tr>
                </thead>
                <?php foreach($ingredients as $ingredient):?>
                    <tr>
                    <td><?php echo $ingredient['name']?></td>
                    <td><?php echo $ingredient['quantity']?></td>
                    </tr>
                <?php endforeach;endif;?>
                </table>
            </div>        
            
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
        <form method="POST" action="<?php echo base_url()?>menu/addIngredients">
         <input type="hidden" name="id" value="<?php echo $id?>">
            <div class="form-group">
                <label for="password">Unit</label>
                <?php 
                    $data = array(
                        'pcs' => 'pcs',
                        'kg' => 'kg',
                    );
                echo form_dropdown('ingredient',$notingredients,'Please Choose',array('class' => 'form-control','id' => 'ingredient'))?>
            </div>
           <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" step="any" class="form-control">
           </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="submit" class="btn btn-primary" value="Save">
      </div>
    </form>
    </div>
  </div>
</div>
<script>
</script>