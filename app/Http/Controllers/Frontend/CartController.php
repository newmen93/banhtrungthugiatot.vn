<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * todo we should use https://github.com/Crinsane/LaravelShoppingcart
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('frontend.v1.cart.cart');
    }

    public function checkout() {
        // load about json file
        $path = storage_path("website.json");
        $about = json_decode(file_get_contents($path), true);
        return view('frontend.v1.cart.checkout', ['about'=>$about]);
    }

    public function addToCart(Request $req) {
        // get request value
        $arrayObj =$req->all();
        $obj = $arrayObj['array'];
        $arrayLength = 0;
        foreach ($obj as $input) {
            $arrayLength += $input['quantity'];
        }
        // echo json_encode($arrayLength); die;
        // find product by id (all request have same product_id => so get the first one)
        $itemInfo = Product::find($obj[0]['product_id']);

        foreach ($obj as $input) {
            $itemSize = $itemInfo->colorBy($input['product_color'])->sizeBy($input['product_size']);
            $price = $itemSize->base_price;

            if($arrayLength >= $itemInfo->quantity_si) {
                $price = $itemSize->si_price;
            } else if ($itemInfo->is_discount == 1) {
                $price = $itemSize->discount_price;
            }
            // create product info add to cart
            $cartInfo= [
                'id' => ($itemInfo->id),
                'name' => ($itemInfo->full_name),
                'qty' => $input['quantity'] ?? 1,
                'price' => ($price),
                'options'=> [
                    'color' => $input['product_color'] ?? null,
                    'size' => $input['product_size'] ?? null,
                    'image' => $input['product_image'] ?? null
                ]
            ];
            Cart::add($cartInfo);
            // add to cart
        }
        // $cart = Cart::content();
        $totalQty =Cart::count();
        return response()->json(['totalQty'=>$totalQty]);
    }

    public function updateQtty(Request $req) {
        $input = $req->all();

        Cart::update($input['rowId'],$input['qty']);

        $prdId = Cart::get($input['rowId'])->id;
        $prdList = Cart::search(function ($cart, $key) use($prdId) {
            return $cart->id == $prdId;
         });
        // get product item
        $product = Product::find($prdId);
        $prdCount = 0;
        $priceList = [];
        foreach($prdList as $item) {
            if($item->id == $prdId) {
                $prdCount+= $item->qty;
            }
        }
        // echo json_encode($prdList[$input['rowId']]); die;
        $itemSize = $product->colorBy($prdList[$input['rowId']]->options->color)->sizeBy($prdList[$input['rowId']]->options->size);
        $price = $itemSize->base_price;
        if ($prdCount >= $product->quantity_si) {
            $price = $itemSize->si_price;
        } else if ($product->is_discount == 1) {
            $price = $product->is_discount;
        }
        // echo json_encode($prdList); die;
        if ($price != $prdList[$input['rowId']]->price) {
            // echo json_encode($listRowId); die;
            foreach($prdList as $item) {
                $size = $product->colorBy($item->options->color)->sizeBy($item->options->size);
                $sizePrice = $size->base_price;
                if ($prdCount >= $product->quantity_si) {
                    $sizePrice = $size->si_price;
                } else if ($product->is_discount == 1) {
                    $sizePrice = $size->discount_price;
                }
                Cart::update($item->rowId,['price'=> $sizePrice]);
                array_push($priceList,[$item->rowId, $sizePrice]);
            }
        }
        $total = Cart::get($input['rowId'])->qty * Cart::get($input['rowId'])->price;
        $totalQty =Cart::count();
        $subTotal = Cart::subTotal();
        return response()->json(['total'=>$total,'totalQty'=>$totalQty,'subTotal'=>$subTotal, 'priceList'=>$priceList]);
    }

    public function removeItem(Request $req) {
        $input = $req->all();
        Cart::remove($input['rowId']);
        $subTotal = Cart::subTotal();
        $totalQty =Cart::count();
        return response()->json(['subTotal'=>$subTotal,'totalQty'=>$totalQty]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
