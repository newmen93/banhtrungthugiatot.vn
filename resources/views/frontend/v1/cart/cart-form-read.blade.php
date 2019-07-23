@if(Cart::count())
    @foreach (Cart::content() as $item)
        <tr class="cart_item">
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
                <span class="amount">{{ $item->qty }}</span>					
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