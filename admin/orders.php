<?php
require('../Beleg/stripe-php-master/init.php');

$public_key_for_js ="1" ;
$live = 0 ;


if( $live == 1 ) {
    // Secret Key des Grosshändlers
    // TODO: change key
        \Stripe\Stripe::setApiKey('sk_test_cFnCai0Ye9NM8Tn9CMo6k0fn00P0R9pt9u');
        $public_key_for_js="pk_test_aLcPqdtG2FDzxPWu5N9OBNOs00Yt0nKnhS";
    } else {
        \Stripe\Stripe::setApiKey('sk_test_51OVhywHIx808e5Q8IQTgwCNEe6QNzvaYS7Mr1XHGcO5qHtV788CCh5fhXzDTe5o92TNiEdA8j0Z0XtOr0dLUaE4H00QRmgncU9');
        $public_key_for_js="pk_test_51OVhywHIx808e5Q8P5i81Vhz7XN0I5T7bmXzifZClFBrSP1PnoZSMVeRtj3pXi742VxPYBI7SPhd90IpKcJNzLHW00zqoj5Kmp"; // PK G19
    }

try {
    $payments = \Stripe\PaymentIntent::all();

    foreach ($payments->data as $payment) {
            // Hier kannst du die Zahlungsinformationen verarbeiten
            echo "Zahlung ID: " . $payment->id . "<br>";
            echo "Betrag: " . $payment->amount_received/100 . " " . $payment->currency . "<br>";
            echo "Status: " . $payment->status . "<br>";
            //echo "Email: " . $payment->email . "<br>";
			//echo "Name: " . $payment->name . "<br>";
			echo "<hr>";
        }
} catch (\Stripe\Exception\ApiErrorException $e) {
        // Hier kannst du Fehlerbehandlung hinzufügen
        echo 'Error: ' . $e->getMessage();
        
}


    
    

?>
<a href="https://ivm108.informatik.htw-dresden.de/ewa/g19/admin/admin.html">Zurück zum Adminbereich</a>

