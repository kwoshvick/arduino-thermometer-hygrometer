<?php
/**
 * Created by PhpStorm.
 * User: kwoshvick
 * Date: 21/04/18
 * Time: 10:26
 */

class Arduino extends MX_Controller{

    function __construct() {
        parent::__construct();
//        $this->load->model('ArduinoModel');
    }

    public function insert_temp_hum($temprature,$humidity,$heat_index){
        echo $temprature,$humidity,$heat_index;
        $data = array(
            'temperature' => $temprature,
            'humidity' => $humidity,
            'heat_index' => $heat_index
        );
        Modules::run('general/insertData', 'temperature_humidity',$data);
    }

    function send(){
        $this->sendSMS('0716290029','FAW Present in soil. Please prepare to take appropriate measures to avoid further damage');
        $this->sendSMS('0716290029','Please do the following : Recharge pesticide in the soil, Flytomax PM biopesticide, Biotrine Pesticide, Antario pesticide');
    }


    function sendSMS($number,$message){
        // Be sure to include the file you've just downloaded
        require_once(APPPATH.'libraries/AfricasTalkingGateway.php');
        // Specify your authentication credentials
        $username   = "Isaack";
        $apikey     = "2f7d535fb2147b5c88b6504283aa77254ceec417ddedab7d433af060d8b1f9f7";
        // Specify the numbers that you want to send to in a comma-separated list
        // Please ensure you include the country code (+254 for Kenya in this case)
        $recipients = $number;
        // And of course we want our recipients to know what we really do
        //$message    = "I'm a lumberjack and its ok, I sleep all night and I work all day";
        // Specify your AfricasTalking shortCode or sender id
        $from = "SendUs";
        // Create a new instance of our awesome gateway class
        $gateway    = new AfricasTalkingGateway($username, $apikey);
        /*************************************************************************************
        NOTE: If connecting to the sandbox:
        1. Use "sandbox" as the username
        2. Use the apiKey generated from your sandbox application
        https://account.africastalking.com/apps/sandbox/settings/key
        3. Add the "sandbox" flag to the constructor
        $gateway  = new AfricasTalkingGateway($username, $apiKey, "sandbox");
         **************************************************************************************/
        // Any gateway error will be captured by our custom Exception class below,
        // so wrap the call in a try-catch block
        try
        {
            // Thats it, hit send and we'll take care of the rest.
            $results = $gateway->sendMessage($recipients, $message,$from);

            foreach($results as $result) {
                // status is either "Success" or "error message"
                echo " Number: " .$result->number;
                echo " Status: " .$result->status;
                echo " MessageId: " .$result->messageId;
                echo " Cost: "   .$result->cost."\n";
            }
        }
        catch ( AfricasTalkingGatewayException $e )
        {
            echo "Encountered an error while sending: ".$e->getMessage();
        }
    }

}