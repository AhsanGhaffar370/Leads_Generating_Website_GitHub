<form action="<?php echo $_SERVER['PHP_SELF'];?> "method="POST">
<script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_TpW2Kzq107pgabuetmy76IxU00DlKr1hoJ"
    data-amount="999"
    data-name="Imran Qasim"
    data-description="Example charge"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto">
</script>
</form>
<?php 
require('./vendor/autoload.php');
if (isset($_POST['stripeToken'])){
    \Stripe\Stripe::setApikey("sk_test_5yb1mKXIURUnNjt5HoIr7G5q00VIpX6hs1");
    $token=$_POST['stripeToken'];
    $email=$_POST['stripeEmail'];
    $charge=\Stripe\Charge::create([
        'amount'=>999,
        'currency'=>'usd',
        'description'=>'Example charge',
        'source'=>$token,
    ]);
    echo "<pre>";
    print_r($charge);
}
?>