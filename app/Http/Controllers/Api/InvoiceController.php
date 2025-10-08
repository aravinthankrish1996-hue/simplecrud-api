<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Services\TaxService;
use App\Models\Invoicemodel;
use Illuminate\Http\Request;


class InvoiceController extends Controller
{
    protected $taxService;
    public function __construct(TaxService $taxService)
    {
        $this->taxService = $taxService;
    }

    /**
     * Calculate the GST and store the invoice in the database.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function calculateInvoice(Request $request)
    {
        // Validate input data
        $request->validate([
           'productname'        => 'required|string|max:255',
           'mrp'                => 'required|integer',
           'base_price'         => 'required|numeric|min:0',
           'gst_rate'           => 'required|numeric|in:5,12,18,28',
        //    'central_gst_rate'   => 'required|numeric|in:5,12,18,28',
        //    'central_gst_amount' => 'required|numeric|min:0',
        //    'state_gst_rate'     => 'required|numeric|in:5,12,18,28',
        //    'state_gst_amount'   => 'required|numeric|min:0',
        ]);

        // Get the base price and GST rate from the request
        $productName = $request->input('productname');
        $mrp = $request->input('mrp');
        $basePrice = $request->input('base_price');
        $gstRate = $request->input('gst_rate');
        $cgstRate= $request->input('central_gst_rate');
        $cgstAmt= $request->input('central_gst_amount');
        $sgstRate= $request->input('state_gst_rate');
        $sgstAmt= $request->input('state_gst_amount');

        // Call the TaxService to calculate GST
        $result = $this->taxService->calculateGST($basePrice, $gstRate,$cgstRate,$cgstAmt,$sgstRate,$sgstAmt);

        // Store the result in the database (in the invoices table)
        $invoice = Invoicemodel::create([
            'productname'=> $productName,
            'mrp'=> $mrp,
            'base_price' => $result['base_price'],
            'gst_rate' => $result['gst_rate'],
            'central_gst_rate' => $result['central_gst_rate'],
            'central_gst_amount' => $result['central_gst_amount'],
            'state_gst_rate' => $result['state_gst_rate'],
            'state_gst_amount' => $result['state_gst_amount'],
            'gst_amount' => $result['gst_amount'],
            'total_price' => $result['total_price'],
        ]);

        // Return the result as a JSON response
        return response()->json([
            'message' => 'Invoice created successfully.',
            'invoice' => $invoice
        ], 201);
    }
}
