<div class="content-wrapper">
    <br>
    <div class="col-md-12">
        <a href="menu/addMenu" class="btn btn-success">Add Menu</a>
    </div>
    <br>
    <div class="col-md-12">
        <div class="row">
        <?php foreach($menus as $menu):?>
            <div class="col-md-3">
                 <div class="card">
        <img class="card-img-top" height="150" src="<?php echo $menu['imagePath']?>" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title"> <?php echo $menu['name']?></h5>
        <h5 class="card-subtitle"> <?php echo 'PHP'. number_format($menu['price'],2)?></h5>
        <p class="card-text"><?php echo $menu['description']?></p>
        <a href="<?php echo base_url()."menu/ingredients/view/".$menu['id']?>" class="btn btn-link">View Ingredi...</a>
        <a href="<?php echo base_url()."menu/view/".$menu['id']?>" class="btn btn-default">Edit</a>
        </div>
        </div>
            </div>
        <?php endforeach;?>
        </div>
    <div> 
</div>