<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{

    public function createPayment()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $post_related = Post::where("is_approved", 1)->orderBy("created_at")->limit(5)->get();
        $post_new = Post::where("is_approved", 1)->orderByDesc("created_at")->limit(5)->get();
        return view("user.pages.donate.payment",compact("categories","tags","post_related","post_new"));
    }
    public function createPay(Request $request)
    {
        $request->validate([
           "name" => "required",
           "email"=>"required",
           "amount" => "required",
           "payment_method" => "required"
        ]);
        if($request->payment_method == "Paypal") {
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();

            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => url("payment/paypal-success"),
                    "cancel_url" => url("payment/paypal-cancel"),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => number_format($request->amount, 2, ".", "") // 1234.45
                        ]
                    ]
                ]
            ]);

            if (isset($response['id']) && $response['id'] != null) {

                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }

                return redirect()
                    ->back()
                    ->with('error', 'Something went wrong.');

            } else {
                return redirect()
                    ->back()
                    ->with('error', $response['message'] ?? 'Something went wrong.');
            }
        }
        return redirect()->to("thank-you");
    }

    public function thankYou()
    {

        return view("user.pages.donate.thankyou");
    }

    public function paypalSuccess(Request $request)
    {

        return redirect()->to("payment/thank-you");
    }
    public function paypalCancel()
    {
        return redirect()
            ->to("/")
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}
