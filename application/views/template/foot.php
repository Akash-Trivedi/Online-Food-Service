<section>
  <div style="background-color: white" class="jumbotron">
    <img src="<?=base_url().'image/image.png' ?>" alt="alt_image" style="width: 100%">
    </div>
</section>
<footer>
<div class="jumbotron">
  <div class="container">
    <div class="row">
      <div class="col-sm-10">
        <a href="<?=base_url().'index.php/Welcome'?>"><img src=<?=base_url().'image/logo.png'?> alt="altimg"></a>
      </div>
      <div class="col-sm-2">
        <div class="display-4">India</div>
      </div>
    </div>
    <hr class="my-4">
    <div class="row">
      <div class="col-sm-3">
        <h5>About GameToh™</h5>
        <ul>
        <?php
        foreach ($aboutgametoh as $key) {?>
            <li><a href="<?=base_url().'index.php/Welcome/divert/'.$key['link']?>"><?php echo $key['name'] ?></a></li>
        <?php
      }
         ?>
         </ul>
      </div>
      <div class="col-sm-3">
        <h5>For Foodies</h5>
        <?php
        foreach ($forfoodies as $key) {?>
            <li><a href="<?=base_url().'index.php/Welcome/divert/'.$key['link']?>"><?php echo $key['name'] ?></a></li>
        <?php
      }
         ?>
      </div>
      <div class="col-sm-3">
        <h5>For Restaurants</h5>
        <?php
        foreach ($forrestaurants as $key) {?>
            <li><a href="<?=base_url().'index.php/Welcome/divert/'.$key['link']?>"><?php echo $key['name'] ?></a></li>
        <?php
      }
         ?>
      </div>
    </div>
    <hr class="my-4">
    <h6>By continuing past this page, you agree to our Terms of Service, Cookie Policy, Privacy Policy and Content Policies. All trademarks are properties of their respective owners. © 2020-2025 - GameToh™ Media Pvt Ltd. All rights reserved.</h6>
  </div>
</div>
</footer>
</body>
</html>
