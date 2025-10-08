<?php

namespace App\Services;

class TaxService
{
    // Define GST rates (adjust these values as per your business requirements)
    // const GST_RATE_5 = 5;
    // const GST_RATE_12 = 12;
    // const GST_RATE_18 = 18;
    // const GST_RATE_28 = 28;

    /**
     * Calculate GST amount based on the base price and GST rate.
     *
     * //@param float $basePrice
     * //@param int $gstRate
     * //@param int $cgstRate
     * //@param int $sgstRate
     * //@param float $cgstAmt
     *  //@param float $sgstAmt
     * //@return array
     */
    public function calculateGST( $basePrice,  $gstRate,  $cgstRate,  $sgstRate,  $cgstAmt, $sgstAmt): array
    {
        // Calculate GST amount
        $gstAmount = ($basePrice * $gstRate) / 100;

$cgstRate = ($gstRate)/2;
$sgstRate = ($gstRate)/2;
$cgstAmt  = ($gstAmount)/2;
$sgstAmt  = ($gstAmount)/2;


          // Calculate total price after adding GST
        $totalPrice = $basePrice + $gstAmount;

        return [
            'base_price' => $basePrice,
            'gst_rate' => $gstRate,
            'central_gst_rate'=> $cgstRate,
            'central_gst_amount'=> $cgstAmt,
            'state_gst_rate'=> $sgstRate,
            'state_gst_amount'=> $sgstAmt,
            'gst_amount' => $gstAmount,
            'total_price' => $totalPrice
        ];
    }
}
