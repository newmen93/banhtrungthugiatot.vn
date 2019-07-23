<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Cart;
use Mail;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Session;


class OrderController extends Controller
{
    private function html_email($order,$orderDetails, $to)
    {
        $totalQty = 0;
        foreach( $orderDetails as $item) {
            $totalQty += $item->quantity;
        }
        $mailArr = [
            'order'=>$order,
            'orderDetails'=>$orderDetails->toArray(),
            'member'=>$to->toArray(),
            'quantity'=>$totalQty,
        ];
        //$data = array('name'=>"Virat Gandhi");
        Mail::send('frontend.v1.email.mail', $mailArr, function($message) use($to) {
            $message->from('danghangnhanhre@gmail.com','Đặt Hàng Nhanh Rẻ');
            $message->to($to->email, $to->name)->subject('Đặt Hàng Thành Công');
        });
        //echo "HTML Email Sent. Check your inbox.";
    }

    public function order(Request $req) {
        try{
            // Insert order to dathangnhare.com
            $cart = Cart::content();
            $member = Customer::where('email',$req->email)
                                ->orWhere('contact_number',$req->tel)
                                ->first();
            if(null == $member) {
                //new customer kioutviet get customer id on kiot
                //$response = $this->saveCustomerTokiot($req);
                $member = new Customer;
                $member->name = $req->name;
                //$member->k_id = $response->id; //gan id cua kiot  cho id cua dhnr
                $member->gender = $req->gender;
                $member->email = $req->email;
                $member->address = $req->address;
                $member->contact_number = $req->tel;
                $member->save();
            } else {
                //update customer kiotviet get customer id on kiot
                // $this->updateCustomerTokiot($req, $member->k_id);
                $member->name = $req->name;
                $member->gender = $req->gender;
                $member->email = $req->email;
                $member->address = $req->address;
                $member->save();
            }
            // $surchages = $this->createSurChages($req);
            //get order id on kiot viet to save my db
            // $order_return = $this->saveOrderToKiot($req, $member, $cart, $surchages);
            // insert into table order
            $order = new Order;
            // $order->k_id = $order_return->id;
            // $order->code = $order_return->code;
            $order->customer_name = $member->name;
            $order->customer_id = $member->k_id;
            $order->customer_code = $member->code;
            $order->payments = $req->payment_type;
            $order->address = $req->address. ' ' . $req->province. ' '. $req->district;
            // set status default (order success - not payment)
            // 0 - order success | 1-payment success | 2-transfer | 3- delivered
            $order->status = 0;
            $order->ship_fee = $req->ship_fee ?? 0;
            $order->description = $req->order_comments;
            $order->total = (float)str_replace(',', '', Cart::subTotal()) + $order->ship_fee;
            // dd($order);
            // TODO: need more field
            $order->save();
            // TODO: need connect API kiot
            // insert into table order detail
            foreach ($cart as $value) {
                $product = Product::whereId($value->id)->first();
                $orderDetail = new OrderDetail;
                $orderDetail->order_id = $order->k_id;
                $orderDetail->product_id = $product->k_id;
                $orderDetail->product_name = $product->name;
                $orderDetail->quantity = $value->qty;
                // TODO
                $orderDetail->price = (float) $value->price * $value->qty;
                $orderDetail->size = $value->options->size;
                $orderDetail->color = $value->options->color;
                $orderDetail->save();
            }
            //send email to customer
            $this->html_email($order->toArray(), $order->orderDetail, $member);

            Cart::destroy();
            /**
             * todo: send mail to client
             */
            return redirect()->route('success')->with(['code'=> $order->code]);

        } catch(\Exception $e) {
            return redirect()->back()->with('error','Đặt hàng thất bại');
        }
    }
    private function saveCustomerTokiot($req)
    {
        $data = [
            'branchId'=> 38930,
            'name' => $req->name,
            'contactNumber'=> $req->tel,
            'gender'=> $re->gender
        ];
        $client = new Client([
            'headers' => [
                'Retailer'      => 'phukiengiadung',
                'Authorization' => 'Bearer ' . Session::get('access_token')
            ]
        ]);
        $request = $client->post('https://public.kiotapi.com/customers', [
            RequestOptions::JSON => $data
        ]);
        return json_decode($request->getBody());
    }
    private function updateCustomerTokiot($req, $k_id)
    {
        $data = [
            'branchId'=> 38930,
            'name' => $req->name,
            'contactNumber'=> $req->tel,
            'gender'=> $re->gender
        ];
        $client = new Client([
            'headers' => [
                'Retailer'      => 'phukiengiadung',
                'Authorization' => 'Bearer ' . Session::get('access_token')
            ]
        ]);
        $request = $client->put('https://public.kiotapi.com/customers/' . $k_id, [
            RequestOptions::JSON => $data
        ]);
    }

    private function createSurChages($req) {
        $data = [
            'name'=>'Phí vận chuyển',
            'value'=> $req->ship_fee ?? 0,
        ];
        $client = new Client([
            'headers' => [
                'Retailer'      => 'phukiengiadung',
                'Authorization' => 'Bearer ' . Session::get('access_token')
            ]
        ]);
        // echo json_encode($data);die;
        $response = $client->post('https://public.kiotapi.com/surchages', [
           RequestOptions::JSON => $data
        ]);
        return json_decode($response->getBody())->data;
    }

    private function saveOrderToKiot($req, $customer, $cart, $surchages)
    {
        $products = [];
        foreach ($cart as $value) {
            $prd = Product::whereId($value->id)->first();
            $temp = [];
            $temp['productId']=$prd->k_id;
            $temp['productCode']=$prd->code;
            $temp['productName']=$prd->name;
            $temp['quantity']=$value->qty;
            $temp['price']=$value->price;
            array_push($products, $temp);
        }
        //call api send order to kiotshop
        $data = [
            "branchId"=> 38930,
            "soldById"=>80879,
            "cashierId"=>80882,
            "discount"=>0.0,
            "description"=> $req->order_comments,
            "method"=> $req->payment_type,
            // "totalPayment"=> (float)str_replace(',', '', Cart::subTotal()) + ($req->ship_fee ?? 0),
            "makeInvoice"=>false,
            "orderDetails" => $products,
            "customer"=>[
                "id"=> $customer->k_id,
                "code"=> $customer->code,
                "name"=> $customer->name,
                "address"=> $req->address. ' ' . $req->province. ' '. $req->district,
                "contactNumber" => $req->tel,
                "email" => $req->email
            ],
            "surchages"=>[
               [ "id"=>$surchages->id,
                "code"=>$surchages->surchargeCode,
                "value"=>$surchages->value
                ]
            ]
        ];
        $client = new Client([
            'headers' => [
                'Retailer'      => 'phukiengiadung',
                'Authorization' => 'Bearer ' . Session::get('access_token')
            ]
        ]);
        // echo json_encode($data);die;
        $response = $client->post('https://public.kiotapi.com/orders', [
           RequestOptions::JSON => $data
        ]);
        return json_decode($response->getBody());
    }

    public function orderSuccess() {
        return view('frontend.v1.cart.checkout-success');
    }
}
