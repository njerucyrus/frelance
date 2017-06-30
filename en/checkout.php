<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/30/17
 * Time: 5:15 PM
 */
require_once 'config.php';


if(isset($_POST['amount'])) {
    $amount = $_POST['amount'];
  ?>
<!DOCTYPE html>
<html>
<head>
    <script src="../public/assets/js/jquery.js"></script>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
    <script type="text/javascript">
        //paste this code under the head tag or in a separate js file.
        // Wait for window load
        $(window).load(function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");
        });
    </script>
    <style>
        .no-js loader { display: none;  }
        .js loader { display: block; position: absolute; left: 100px; top: 0; }
        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            /*background: url('../public/assets/Preloader/Preloader_2.gif') center no-repeat #fff;*/
        }
    </style>
</head>
<body>
<!--- paypal fields here--->

<form name="payment_form" id="payment_form" action="<?php echo constant('SANDBOX_PAYPAL_URL')?>" method="post">

    <!-- Identify your business so that you can collect the payments. -->
    <input type="hidden" name="business" value="<?php echo constant('MERCHANT_EMAIL')?>">

    <!-- Specify a Buy Now button. -->
    <input type="hidden" name="cmd" value="_xclick">

    <!-- Specify details about the item that buyers will purchase. -->
    <input type="hidden" name="item_name" value="Cart Checkout">
    <input type="hidden" name="item_number" value="<?php echo uniqid()?>">
    <!-- set amount using js-->
    <input type="hidden" name="amount"  value="<?php echo $amount?>">
    <!-->
    <input type="hidden" name="currency_code" value="USD">

    <!-- Specify URLs -->
    <input type="hidden" name="notify_url" value="<?php echo constant('NOTIFY_URL')?>" />
    <input type='hidden' name='cancel_return' value='<?php echo constant('CANCEL_URL')?>'>
    <input type='hidden' name='return' value='<?php echo constant('RETURN_URL')?>'>
    <!--end of paypalfields-->

</form>
<script type="text/javascript">
    document.payment_form.submit();
</script>
</body>
</html>
<?php
}
?>
