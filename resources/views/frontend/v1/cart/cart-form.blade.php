@if(Cart::count())
    @foreach (Cart::content() as $item)
        <tr class="cart_item">
            <td class="product-remove">
                <input id="trash-id" name="trash-id" type="hidden" value="{{ $item->rowId }}">
                <a href="" class="remove btn-trash" title="Remove this item">×</a>					
            </td>
            <td class="product-thumbnail ">
                <a href="{{route('detail',str_slug($item->name.' '.$item->id,'-'))}}">
                    <img src="{{$item->options->image}}" class="attachment-shop_thumbnail wp-post-image" alt="{{$item->name}}">
                </a>					
            </td>
            <td class="product-name">
                <a href="{{route('detail',str_slug($item->name.' '.$item->id,'-'))}}">{{$item->name}}</a>					
            </td>
            <td class="product-price">
                <span class="amount">{{number_format($item->price)}} VNĐ</span>					
            </td>
            <td class="product-quantity">
                <div class="quantity-adder">
                    <div class="quantity buttons_added" style="width: 100px;">
                        <input id="id" type="hidden" name="row-id" value="{{ $item->rowId }}">
                        <input type="hidden" id="{{ $item->rowId }}"/>
                        <input id="quantity" type="text" name="qty" class="quantity-btn" value="{{ $item->qty }}">
                    </div>
                </div>
            </td>
            <td class="product-name">
                @if($item->options->size != null || $item->options->color != null)
                <span class="amount">{{$item->options->size??'default'}}/{{$item->options->color??'default'}}</span>
                @endif						
            </td>
            <td class="product-subtotal">
                <span class="amount">{{number_format(($item->price * $item->qty))}} VND</span>					
            </td>
       </tr>
    @endforeach
@else 
<span>Không có sản phẩm trong giỏ hàng </span>
@endif