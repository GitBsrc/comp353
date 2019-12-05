<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
class PaymentController extends Controller {
    // Charge client a $20 deposit
    public static function deposit($amount = null ){
        $user_id = Auth::id();
        $random = rand(5, 200000);

        $square = array(
            "idempotency_key" => uniqid(),
            "order" => array(
              "reference_id" => (string)$random,
              "line_items" => array (
                  array(
                    "name" => "Deposit",
                    "quantity" => "1",
                    "base_price_money" => array(
                    "amount" => $amount,
                    "currency" => "CAD"
                    ),
                )
              )
            ),
            "redirect_url" => "https://storagefellows.com/confirm",
        );

        $json = json_encode($square);
        return $json;
    }

    public static function initApiClient() {

        $GLOBALS['ACCESS_TOKEN'] = env('SQUARE_ACCESS_TOKEN', 'sandbox-sq0atb-PXR6i_dkp5nQpn09pFkpDw');
        $GLOBALS['STORE_NAME'] = env('SQUARE_STORE_NAME', 'Storage Fellows');
        $GLOBALS['LOCATION_ID'] = env('SQUARE_LOCATION_ID', 'CBASEKk60CHv09BQ9ktOMqxVbAggAQ');
        $GLOBALS['API_CLIENT_SET'] = env('SQUARE_API_CLIENT_SET', false);
        // If we've already set the API client, we don't need to do it again
        if ($GLOBALS['API_CLIENT_SET']) { return; }
        // Create and configure a new Configuration object
        $configuration = new \SquareConnect\Configuration();
        $configuration::getDefaultConfiguration()->setSSLVerification(FALSE);
        \SquareConnect\Configuration::getDefaultConfiguration()->setAccessToken($GLOBALS['ACCESS_TOKEN']);
        // Create a LocationsApi client to load the location ID
        $locationsApi = new \SquareConnect\Api\LocationsApi();
        // Grab the location key for the configured store
        try {
            $apiResponse = $locationsApi->listLocations()->getLocations();
            // There may be more than one location associated with the account (e.g,. a
            // brick-and-mortar store and an online store), so we need to run through
            // the response and pull the right location ID
            foreach ($apiResponse as $location) {
            if ($GLOBALS['STORE_NAME'] == $location->getName()) {
                $GLOBALS['LOCATION_ID'] = $location['id'];
                if (!in_array('CREDIT_CARD_PROCESSING', $location->getCapabilities())) {
                print(
                    "[ERROR] LOCATION  " . $GLOBALS['STORE_NAME'] .
                    " can't process payments"
                );
                exit();
                }
            }
            }
            if ($GLOBALS['LOCATION_ID'] == null) {
            print(
                "[ERROR] LOCATION ID NOT SET. A location ID for " .
                $GLOBALS['STORE_NAME'] . " could not be found"
            );
            exit;
            }
            $GLOBALS['API_CLIENT_SET'] = true;
        } catch (Exception $e) {
            // Display the exception details, clear out the client since it couldn't
            // be properly initialized, and exit
            echo "The SquareConnect\Configuration object threw an exception while calling LocationApi->listLocations: ", $e->getMessage(), PHP_EOL;
            $GLOBALS['API_CLIENT'] = null;
            exit;
        }
    }
}
