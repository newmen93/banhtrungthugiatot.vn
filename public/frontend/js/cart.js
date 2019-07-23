/* <![CDATA[ */
jQuery(document).ready(function($) {
    'use strict';
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    
    // $('body').on("change","#sl",(function(e){
    //     e.preventDefault();
    //     var divBtnCart = e.currentTarget.parentElement.parentElement.children[1];
    //     var qty = e.currentTarget.value;
    //     divBtnCart.children[0].children[1].value=qty;
    // }));
    
    /**
    *click vào icon thêm giỏ hàng
    **/
    // $("#form-add-to-cart").submit(function(e){
    //     e.preventDefault();
    //     $.ajax({
    //         type: "POST",
    //         url: "/add-to-cart",
    //         data: $(this).serialize(),
    //         success: function(data){
    //             $('.badge-kiot').text(data.totalQty);
    //             $('.notification').append('<div class="\
    //                 alert alert-success alert-dismissible fade in" width="50px">\
    //             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\
    //             Thêm thành công vào giỏ hàng.\
    //             </div>')
    //             // // set thời gian đóng popup
    //             $(".alert-success").delay(1300).slideUp(200, function() {
    //                 $(this).alert('close');
    //                 });
    //         },
    //         error:function(data){
    //             console.log(data);
    //         }
    //     });
    // });
    $('body').on('submit','#form-add-to-cart', function(e) {
        e.preventDefault();
        let values = [];
        let obj= {};
        let formData= $(this).serializeArray()
        $.each(formData, function (i, field) {
            if(field.name == 'product_id') {
                if (obj['product_id']) {
                    if(obj['quantity'] != 0) {
                        values.push(obj);
                    } else {
                        obj={}
                    }
                }
                obj = {};
                obj[field.name] =field.value
            } else {
                obj[field.name] =field.value
            }
            if (i == 9) {
                console.log('asaas')
                console.log(formData.length)
            }
            if (i === (formData.length - 1)) {
                if(obj['quantity'] != 0) {
                    values.push(obj);
                } else {
                    obj={}
                }
            }
        });
        let data = {};
        data['array']=values;
        $.ajax({
            type: "POST",
            url: "/add-to-cart",
            data: data,
            success: function(data){
                $('.badge-kiot').text(data.totalQty);
                $('.notification').append('<div class="\
                    alert alert-success alert-dismissible fade in" width="50px">\
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\
                Thêm thành công vào giỏ hàng.\
                </div>');
                // // set thời gian đóng popup
                $(".alert-success").delay(1300).slideUp(200, function() {
                    $(this).alert('close');
                    });
            },
            error:function(data){
                console.log(data);
            }
        });
    });
});
