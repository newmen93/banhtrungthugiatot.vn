@extends('backend.v1.layouts.app')

@push('styles')
<style>
    .custom-dropdown {
        /* position: absolute;
        top:50%;
        transform: translateY(-50%); */
    }
    a {
        color: #fff;
    }
    .custom-dropdown dd,
    .custom-dropdown dt {
        margin: 0px;
        padding: 0px;
    }

    .custom-dropdown ul {
        margin: -1px 0 0 0;
    }

    .custom-dropdown dd {
        position: relative;
    }

    .custom-dropdown a,
    .custom-dropdown a:visited {
        color: #fff;
        text-decoration: none;
        outline: none;
        font-size: 12px;
    }

    .custom-dropdown dt a {
        background-color: #3c8dbc;
        display: block;
        padding: 8px 20px 5px 10px;
        min-height: 25px;
        line-height: 24px;
        overflow: hidden;
        border: 0;
        width: 272px;
    }

    .custom-dropdown dt a span,
    .multiSel span {
        cursor: pointer;
        display: inline-block;
        padding: 0 3px 2px 0;
    }

    .custom-dropdown dd ul {
        background-color: #4ba7dd;
        border: 0;
        color: #fff;
        display: none;
        left: 0px;
        padding: 2px 15px 2px 5px;
        position: absolute;
        top: 2px;
        width: 280px;
        list-style: none;
        height: 200px;
        overflow: auto;
    }

    .custom-dropdown span.value {
        display: none;
    }

    .custom-dropdown dd ul li a {
        padding: 5px;
        display: block;
    }

    .custom-dropdown dd ul li a:hover {
        background-color: #fff;
    }
</style>
@endpush

@section('content')

<!-- Main content -->
<section class="invoice">
@include('backend.v1.shipping._form')
</section>

@stop
@push('scripts')
@include('backend.v1.layouts.data-table-script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#customer-tb').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            language: {
                url: "{{asset('backend/dataTable/Vietnamese.json')}}"
            },
            serverSide: true,
            processing: true,
            ajax: {
                url:"{{route('admin.customer.table')}}",
                dataType:"json",
                type:"POST",
                data:{"_token":"<?=csrf_token() ?>"}
            },
            columns: [
                {data: 'code'},
                {data: 'username', searchable: true},
                {data: 'name', orderable: false},
                {data: 'email', orderable: false},
                {data: 'phone', orderable: false},
                {data: 'address', orderable: false}, //, orderable: false
                {data: 'action', orderable: false} //orderable: false, searchable: false
            ]

        });

        $('#customer-tb').on('click', 'tr td .btn-edit', function () {
            //alert('Clicked row id is: ' + $(this).data('id'));
            $("#updateCustomer").modal()
        });
        $('#customer-tb').on('click', 'tr td .btn-delete', function () {
            //alert('Clicked row id is: ' + $(this).data('id'));
            $("#confirmDelete").modal()
        });
    });

// Dropdown with Multiple checkbox select with jQuery - May 27, 2013
// (c) 2013 @ElmahdiMahmoud
// license: https://www.opensource.org/licenses/mit-license.php


$(".custom-dropdown dt a").on('click', function() {
  $(".custom-dropdown dd ul").slideToggle('fast');
});

$(".custom-dropdown dd ul li a").on('click', function() {
  $(".custom-dropdown dd ul").hide();
});

function getSelectedValue(id) {
  return $("#" + id).find("dt a span.value").html();
}

$(document).bind('click', function(e) {
  var $clicked = $(e.target);
  if (!$clicked.parents().hasClass("custom-dropdown")) $(".custom-dropdown dd ul").hide();
});

$('.mutliSelect input[type="checkbox"]').on('click', function() {

  var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
    title = $(this).val() + ",";


  if ($(this).is(':checked')) {
    var html = '<span title="' + title + '">' + title + '</span>';
    $('.multiSel').append(html);
    $(".hida").hide();
  } else {
    $('span[title="' + title + '"]').remove();
    var ret = $(".hida");
    $('.custom-dropdown dt a').append(ret);
  }
  console.log($('.multiSel span').length);
  if($('.multiSel span').length===0){
      $('.hida').show();
  }
});


    var jsonData;
    fetch('/frontend/json/addressBundle.json', {cache: 'no-cache'})
    .then(function(response) {
        return response.json();
    })
    .then(function(addressJson) {
        console.log(addressJson);
        $('input#jsondata').val(JSON.stringify(addressJson));
        jsonData = JSON.parse(JSON.stringify(addressJson));
        $("ul.lst-district").find("li").remove();
        console.log(addressJson);
        for (var i =0 ;i < jsonData[49].district.length;i++) {
            let check = '';
            let item = jsonData[49].district[i];
            if(item.value == '2') {
                check = 'checked';
            }
            $("ul.lst-district").append( `<li><input type="checkbox" ${check} class="district-select" value="${item.value}" />${item.name}</li>`)
        }
    });

    $('body').on('change','.district-select',function(){
        $(this).attr("value",2);
        var templateItem = $(this).closest("li")[0];

        for (var i = 0; i < jsonData[49].district.length; i++) {
            var item = jsonData[49].district[i];
            if(item.name===templateItem.innerText){
                jsonData[49].district[i].value = jsonData[49].district[i].value == 3 ? 2 : 3;
                //console.log(jsonData) ; // need to overwrite this jsonData to addressBundle.json
            }
        }
        $('input#jsondata').val(JSON.stringify(jsonData));
        console.log(jsonData);
    });

</script>

@endpush
