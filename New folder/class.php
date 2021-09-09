<?php
  class Item{
    private $item;
    private $name;
    private $price;
    private function insert(){

    }
    public function display(){
      echo '
        <div class="row container"><!--individual container-->
          <div class="row border border-bottom-danger rounded container"><!--first row-->
            <div class="col-sm-4"><h6>PHOTO OF ITEM</h6></div>
            <div class="col-sm-6">
              <div class="row"><h6>RESTAURANT NAME</h6></div>
              <div class="row"><div class="text-danger text-capitalize h3 font-weight-bolder">BRAND</div></div>
              <div class="row"><h6>STREET</h6></div>
              <div class="row"><h6>ADDRESS</h6></div>
            </div>
            <div class="col-sm-2"><h6>RATING VOTE COUNT</h6></div>
          </div>
          <div class="row container"><!--first row over & second row-->
            <div class="col-md-4 text-secondary text-">CUISINES:</div>
            <div class="col-md-8"><h6>'.$this->name.'</h6></div>
          </div><!--second row over and third row starts-->
          <div class="row container">
            <div class="col-sm-4 text-secondary"><h6>COST FOR TWO:</h6></div>
            <div class="col-sm-8"><h6>'.$this->price.'</h6></div>
          </div><!--third row over and fourth row starts-->
          <div class="row container">
            <div class="col-sm-4 text-secondary"><h6>HOURS:</h6></div>
            <div class="col-sm-8"><h6>11am-11:30pm (Mon-Sun)</h6></div>
          </div>
          <div class="row container"><!--fourth row over and fifth row starts-->
            <div class="col-sm-4 text-secondary"><h6>FEATURED IN:</h6></div>
            <div class="col-sm-8"><h6>Pizza Time</h6></div>
          </div>
          <div class="row container border border-bottom dark text-center">
            <div class="col p-3 border border-dark"><h6><i class="fa fa-phone" aria-hidden="true"></i> Call</h6></div>
            <div class="col p-3 border border-dark"><h6><i class="fa fa-list" aria-hidden="true"></i> View-menu</h6></div>
            <div class="col bg-success p-3 border border-dark"><h6><i class="fa fa-shopping-basket" aria-hidden="true"></i> Order-now</h6></div>
          </div>
          </div><!--individual container ends-->';
    }
  }