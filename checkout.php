<?php

require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "sk_test_51ON8wmGR3Wa0oATH82ae0NLLvuL3WzJVBWdWx6eO1INw7Sy5BYhzD55MUo8d8VBAL6TIRXyShJMvxJ8SMHXjQPnp0090NqcA1t";

\Stripe\Stripe::setApiKey($stripe_secret_key);

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost/CCS1/success.php",
    "line_items" => [
        [
            "quantity" => 1,
            "price_data" => [
                "currency" => "usd",
                "unit_amount" => 4000,
                "product_data" => [
                    "name" => "Planescape Collection"
                ]
            ]

        ]
    ]

                ]);
    
http_response_code(303);
header("Location: " . $checkout_session->url);

?>