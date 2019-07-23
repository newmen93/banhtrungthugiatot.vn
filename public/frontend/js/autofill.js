/* <![CDATA[ */
    jQuery(document).ready(function($) {

        'use strict'; 
 
    /**
    * load thông tin member
    **/
   $("#phone_number").focusout(function(){

    var phone_number = $("#phone_number").val();

    if("" == phone_number) {
        $("input[name='name']").val("");
        $("input[name=gender][value=0]").prop('checked', true);
        $("input[name='email']").val("");
        $("input[name='address']").val("");
      return;
    }

    $.ajax({
      type: "POST",
      url: "/get_member_info",
      data: {'phone_number': phone_number},
      success: function(data) {
        
        $("input[name='name']").val(data.name);
        $("input[name=gender][value=" + data.gender+ "]").prop('checked', true);
        $("input[name='email']").val(data.email);
        $("input[name='address']").val(data.address);
      },
      error:function(data) {
      }
    });
  });

})