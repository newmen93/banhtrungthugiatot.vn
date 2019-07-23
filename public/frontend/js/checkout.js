/* <![CDATA[ */
    jQuery(document).ready(function($) {
        'use strict';
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('value')
                }
        });
        // touch spin
       $(".quantity-btn").TouchSpin({
            min: 1,
            max: 1000
       });
       // on change touch spin
       $('body').on("change",".quantity-btn",(function(e){
            e.preventDefault();
            let subTotal =  $(this).closest('tr').find('td.product-subtotal .amount');
            $(".quantity-btn").attr("disabled", true);
            $.ajax({
                type: "POST",
                url: "/update_quantity",
                data: {'rowId': $(this).parent().parent().find('input[name="row-id"]').val(),
                        'qty': $(this).closest('input').val()
                        },
                success: function(data){
                    $(".quantity-btn").attr("disabled", false);
                    $('.badge-kiot').text(data.totalQty);
                    data.priceList.forEach(element => {
                        // 0 is rowId, 1 is value
                        $('#'+element[0]).closest('tr').find('td.product-price .amount').text(Number(element[1]).toLocaleString('en') + ' VND');
                        let qty = $('#'+element[0]).parent().find('#quantity').val()
                        $('#'+element[0]).closest('tr').find('td.product-subtotal .amount').text((Number(element[1])*qty).toLocaleString('en') + ' VND')
                    });
                    $(subTotal).text(data.total.toLocaleString('en') + ' VND');
                    $('.subTotal').text(data.subTotal.toLocaleString('en')+ ' VND')
                },
                error:function(data){
                    console.log(data);
                }
              });
        }));

        /**
         * remove item from cart
         */
        $('body').on("click",".btn-trash",(function(e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/remove_item",
                data: {'rowId': $(this).parent().find('input[name="trash-id"]').val()
                        },
                success: function(data){
                    e.currentTarget.closest('tr').remove();
                    $('.subTotal').text(data.subTotal);
                    $('.badge-kiot').text(data.totalQty);
                    if(data.subTotal == 0) {
                        $('.btn-order').remove();
                        $('.target-scroll').remove();
                        $('.cart_item').append('<p>Không có sản phẩm nào trong giỏ hàng</p>');
                    }
                },
                error:function(data){
                    console.log(data);
                }
              });
        }));
    });