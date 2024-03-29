// -------   Mail Send ajax

$(document).ready(function () {
    var form = $('#myForm'); // contact form
    var submit = $('.submit-btn'); // submit button
    var alert = $('.alert-msg'); // alert div for show alert message

    // form submit event
    form.on('submit', function (e) {
        e.preventDefault(); // prevent default form submit
        $.ajax({
            url: form.attr('action'), // form action url
            type: 'POST', // form submit method get/post
            dataType: 'json', // request type html/json/xml
            data: form.serialize(), // serialize form data
            beforeSend: function () {
                alert.fadeOut();
                submit.html('Sending....'); // change submit button text
            },
            success: function (data) {
                alert.html(data).fadeIn(); // fade in response data
                setTimeout(function () {
                    alert.html("");
                }, 5000);
                form.trigger('reset'); // reset form
                submit.attr("style", "display: none !important");; // reset submit button text
            },
            error: function (e) {
                console.log(e)
            }
        });
    });
});