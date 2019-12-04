<?php


namespace App\Providers;

use DateTime;

class Generator
{
    // Increments discount by 4% every 3 times an event is repeated
    public static function generate_discount($repeated_events, $current_discount){
        if ($repeated_events % 2 == 1){
            $current_discount += 4;
        }
        return $current_discount;
    }

    // Applies a certain discount on a price
    public static function apply_discount($base_price, $price_discount){
        return (($base_price)-($base_price*($price_discount/100)));
    }

    // Generates price based on event bandwidth, storage, and type
    public function generate_price($event_type, $system_price_rate){
        if ($event_type == "Profit") {
            return $system_price_rate;
        }
        else{
            return 0;
        }
    }

    public function add_config_rates($storage, $bandwidth, $storage_rate, $bandwidth_rate){
        $extra_storage = abs(50 - $storage);
        $extra_bandwidth = abs(86.92 - $bandwidth);

        return ($extra_storage*$storage_rate)+($extra_bandwidth*$bandwidth_rate);
    }

    // Generate event status by checking current date within the bounds of start and end dates
    public static function generate_status($startDate, $endDate){

        if( is_string($startDate) & is_string($endDate)){
            $start = date("Y-m-d H:i:s", strtotime($startDate));
            $end = date("Y-m-d H:i:s", strtotime($endDate));
        }
        else{
            $start = $startDate->format('Y-m-d H:i:s');
            $end = $endDate->format('Y-m-d H:i:s');
        }


        if( (strtotime('now') < strtotime($start)) & (strtotime('now') < strtotime($end)) ){
            return 'Upcoming';
        }
        else if( (strtotime('now') > strtotime($start)) & (strtotime('now') < strtotime($end)) ){
            return 'In Progress';
        }
        else if ( (strtotime('now') > strtotime($start)) & (strtotime('now') > strtotime($end)) ){
            return 'Archived';
        }
    }

    public function date_is_greater($date1, $date2){
        $date1 = new DateTime($date1);
        $date2 = new DateTime($date2);
        return $date1>$date2;
    }

    // If var1 is null return var2
    public function verify_null($var1, $var2){
        if (empty($var1)){
            $var1 = $var2;
        }
        return $var1;
    }

    public function generate_random_type(){
        $input = array("profit", "non-profit");
        $rand_keys = array_rand($input, 2);
        return $input[$rand_keys[0]];
    }

    public function merge_date_time($date, $time){
        return date('Y-m-d H:i:s', strtotime("$date $time"));
    }
}
