<?php
const TITLE="CheckOut";
require_once("head.php");
?>
<div class="check-out form row">
<div class="col-sm-5">
  <form method="post" action="paytm/PaytmKit/pgRedirect.php">
  <table class="table table-hover">
    <thead>
      <tr>
      <th>S.No</th><th>Label</th><th>Value</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>ORDER-ID</td>
        <td><?php echo  "ORDS" . rand(10000,99999999)?></td>
        <td><input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20"
            name="ORDER_ID" autocomplete="off"
            value="<?php echo  "ORDS" . rand(10000,99999999)?>">
        </td>
      </tr>
      <tr>
        <td>2</td>
        <td>CUSTOMER-ID</td>
        <td><?php print_r($_SESSION['cart'])?></td>
        <td><input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001"></td>
      </tr>
      <tr>
        <td>3</td>
        <td>INDUSTRY TYPE-ID</td>
        <td>RETAIL</td>
        <td><input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
      </tr>
      <tr>
        <td>4</td>
        <td>CHANNEL</td>
        <td>WEB</td>
        <td><input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12"
            size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
        </td>
      </tr>
      <tr>
        <td>5</td>
        <td>STANDING AMOUNT</td>
        <td><?php $_POST['amount']?></td>
        <td><input  title="TXN_AMOUNT" tabindex="10"
            type="hidden" name="TXN_AMOUNT"
            value="<?php echo $_POST['amount']?>">
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><input value="CheckOut" type="submit"	onclick=""></td>
      </tr>
    </tbody>
  </table>
  * - Mandatory Fields
  </form>
  </div>
</div>
<?php
require_once("foot.php");
?>