/* <![CDATA[ */
jQuery(document).ready(function($) {
    'use strict';
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

    var jsonData;
    fetch('/frontend/json/addressBundle.json', {cache: 'no-cache'}).then(function(response) {
        return response.json();
    })
    .then(function(addressJson) {
        jsonData = JSON.parse(JSON.stringify(addressJson))
        $.each(addressJson, function(index, value){
            $("select[name='province']").append('<option value="' + value.name + '">' + value.name +   
            '</option>');
        })
    });

    $("select[name='province']").on('change', function(e){
        let name = $(this).find('option:selected').val()
        let hiddenInput = $(this).closest('tr').find('input[name="province_value"]');
        // remove all old data
        $("select[name='district']").find('option')
        .remove().end()
        .append('<option value="">Chọn Quận/Huyện</option>')
        jsonData.filter(function(n, i) {
            if(n.name == name) {
                $(hiddenInput).val(n.value);
                $.each(n.district, function(index, value){
                    $("select[name='district']").append('<option value="' + value.name + '">' + value.name +   
                    '</option>');
                })
            }
        })
    })
    $("select[name='district']").on('change',function(e) {
        let provinceValue = $(this).closest('tr').find('input[name="province_value"]').val()
        let district = $(this).find('option:selected').val()
        let data ={
            'province_value': provinceValue,
            'total': $(this).closest('tbody').find('input[name="sub-total"]').val()
        }
        let provinceName = $(this).closest('tr').find("td select[name='province']").val()
        jsonData.filter(function(n, i) {
            if(n.name == provinceName) {
                $.each(n.district, function(index, value){
                    if(value.name == district) {
                        data['district']= value.value
                    }
                })
            }
        });
        $.ajax({
            type: "POST",
            url: "/ship-fee",
            data: data,
            success: function(result){
                $('.ship_fee').text(Number(result).toLocaleString('en') + ' VND');
                $('input[name="ship_fee"').val(result);
                let subTotal = '';
                let objTotal = $('input[name="subTotal"]').val().split(',');
                objTotal.forEach(function(element) {
                    subTotal+= element;
                })

                $('.subTotal').text((Number(subTotal) + Number(result)).toLocaleString('en')+ ' VND');
            },
            error:function(result){
                console.log(result);
            }
        });

    })
})