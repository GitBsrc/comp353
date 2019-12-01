<?php
// Include the Square Connect API resources
$autoload = base_path('vendor/autoload.php');
require_once($autoload);
// API initialization - Configure your online store information
$GLOBALS['ACCESS_TOKEN'] = env('SQUARE_ACCESS_TOKEN', 'EAAAEOJOQnwCL7WJSKZ6zyETtvr7RhpisxE_2plRbIJux3xrwiKLXQ7cb3FMP4-x');
$GLOBALS['STORE_NAME'] = env('SQUARE_STORE_NAME', 'storagefellows');
$GLOBALS['LOCATION_ID'] = env('SQUARE_LOCATION_ID', 'X2D7TS1XR1MES');
$GLOBALS['API_CLIENT_SET'] = env('SQUARE_API_CLIENT_SET', false);
// Sanity check that all the needed configuration elements are set
if ($GLOBALS['STORE_NAME'] == null) {
  print(
    "[ERROR] STORE NAME NOT SET. " .
    "Please set a valid store name to use Square Checkout."
  );
  exit;
} else if ($GLOBALS['ACCESS_TOKEN'] == null) {
  print(
    "[ERROR] ACCESS TOKEN NOT SET. Please set a valid authorization token " .
    "(Personal Access Token or OAuth Token) to use Square Checkout."
  );
  exit;
}
?>