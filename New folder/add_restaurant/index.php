<?php 
  const TITLE="Add Restaurant";
  include("../head.php");
?>
<div class="jumbotron">
  <div class="container">
  <div class="row">
  <div class="col-sm-7 p-3 mb-2">
    <div class="row"><h3>Add a Restaurant</h3></div>
    <div class="row"><h4>Basic info</h4></div>
    <div class="row"><!--form division starts-->
        <form action="addRestaurant.php" method="POST">
          <div class="form-group">
            <label for="r-name">RESTAURANT NAME*</label>
            <input type="text" class="form-control" name="r-name" placeholder="Enter restaurant name..." required="true">
          </div>
          <div class="form-group">
            <label for="r-city">CITY*</label>
            <input type="text" class="form-control" name="r-city" placeholder="Restaurant's City" required="true">
          </div>
          <div class="form-group">
            <label for="r-city">STATE*</label>
            <input type="text" class="form-control" name="r-state" placeholder="Restaurant's State" required="true">
          </div>
          <div class="form-group">
            <label for="r-city">Street*</label>
            <input type="text" class="form-control" name="r-street" placeholder="Example: BhairavNath, Maninagar, Ahmedabad" required="true">
          </div>
          <div class="form-group row">
              <div class="col-sm-5">STD</div>
              <div class="col-sm-7">Contact Number</div>
            </div>
            <div class="form-group row">
              <div class="col-sm-5"><input type="text" size="6" name="std" placeholder="STD" maxlength="6"></div>
              <div class="col-sm-7"><input type="text" name="contact" placeholder="Restaurant contact number..." size="25" maxlength="10"></div>
            </div>
          </div>
          <div class="row"><button type="submit" class="btn btn-success btn-block" name="addrest">Add Restaurant</button></div>
        </form>
        </div><!--form division ends-->

      <div class="col-sm-5">
          <h2>How it works</h2>
          <ul style="padding-left: 18px">
            <li>If you are the owner of a restaurant, or if you are a user who's discovered a place not listed on Zomato, let us know using this form.</li><br>
            <li>Once you send the information to us, our awesome content team will verify it. To help speed up the process, please provide a contact number or email address.</li><br>
            <li>That's it! Once verified the listing will start appearing on Zomato</li>
          </ul>
      </div>
    </div>
    </div>
  </div>
</div>
