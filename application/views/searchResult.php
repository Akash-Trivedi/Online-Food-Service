  <div class="container py-1">
        <?php for($i=0; $i<sizeof($items) AND sizeof($items[$i])>0; $i++){?>
          <div class="container py-1">
            <div class="row">
              <div class="col-sm-4">
                <img src="<?=base_url().$items[$i]['photo']?>" style="width: 200px; height: 200px;">
              </div>
              <div class="col-sm-8">
                <div class="row"><h6><?=$items[$i]['nm']?></h6></div>
                <div class="row"><div class="text-danger text-capitalize h3 font-weight-bolder"><?=$items[$i]['nm']?></div></div>
                <div class="row"><h6>STREET: <?=$items[$i]['street']."\n".$items[$i]['city'].", ".$items[$i]['rstate']?></h6></div>

              <div class="row"><!--first row over & second row-->
                <div class="col-md-4 text-secondary text-">Name:</div>
                <div class="col-md-8"><h6><?=$items[$i]['itemName']?></h6></div>
              </div><!--second row over and third row starts-->

              <div class="row">
                <div class="col-sm-4 text-secondary"><h6>COST FOR TWO:</h6></div>
                <div class="col-sm-8"><h6><?=$items[$i]['price']?></h6></div>
              </div><!--third row over and fourth row starts-->

              <div class="row">
                <div class="col-sm-4 text-secondary"><h6>HOURS:</h6></div>
                <div class="col-sm-8"><h6>11am-11:30pm (Mon-Sun)</h6></div>
              </div>
            </div>
          </div>

          <div class="row border border-bottom dark text-center">
              <div class="col p-3 border border-dark"><h6><i class="fa fa-phone" aria-hidden="true"></i> Call</h6></div>
              <div class="col p-3 border border-dark"><h6><i class="fa fa-list" aria-hidden="true"></i> View-menu</h6></div>
              <input type="hidden" name="productId" value="'.$id.'">
              <input type="hidden" name="restaurantId" value="'.$rid.'">
              <button type="submit" class="btn btn-warning my-3" name="add">Add to Cart <i class="fas fa-shopping-cart"></i></button>
          </div><!--individual container ends-->





            </div></div>
        <?php }?>
  </div>
