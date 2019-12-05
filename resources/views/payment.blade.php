<?php

use \App\Http\Controllers\PaymentController;

// Include the Square Connect API resources, store config, and helper functions
$autoload = base_path('vendor/autoload.php');
$path = app_path('Http/Controllers/PaymentController.php');
require($path);
require_once($autoload);
 $orderArray = PaymentController::deposit(25);
PaymentController::initApiClient();
// Create a new API object to send order information to Square Checkout
$checkoutClient = new \SquareConnect\Api\CheckoutApi();
try {
  // Send the order array to Square Checkout
  $apiResponse = $checkoutClient->createCheckout(
    $GLOBALS['LOCATION_ID'],
    $orderArray
  );
  // Grab the redirect url and checkout ID sent back
  $checkoutUrl = $apiResponse['checkout']['checkout_page_url'];
  $checkoutID = $apiResponse['checkout']['id'];
} catch (Exception $e) {
  echo "The SquareConnect\Configuration object threw an exception while " .
       "calling CheckoutApi->createCheckout: ", $e->getMessage(), PHP_EOL;
  exit();
}
// Redirect the customer to Square Checkout
header("Location: $checkoutUrl"); ?>
