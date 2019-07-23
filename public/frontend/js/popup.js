// (function($) {

// 	$(document).ready(function() {
// 		/*gallery-fancybox*/
// 		$(function(){
// 			$('.quickview').click(function () {
// 				$.fancybox({
// 				 'width': '80%',
// 				 'height': '100%',
// 				 'autoSize': true,
// 				 'scrolling': 'no',
// 				  'href' : 'product-popup.blade.php',
// 				'type' : 'iframe'
// 				});
// 			});
// 		});
// 	});

// })(jQuery);
/* <![CDATA[ */
jQuery(document).ready(function ($) {
	'use strict';
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$(".quantity-product").TouchSpin({
		min: 0,
		max: 1000
	}).on('change', function (e) {
		let oldQty = $(this).closest('tr').find('td.product-quantity .hidden-qty').val()
		let changeQty = $(this).val() - oldQty;
		// let basePrice = parseInt($(this).closest('tr').find('td.product-price .product-amount').val()) || 0;
		// let siPrice = parseInt($(this).closest('tr').find('td.product-price .product-amount-si').val()) || 0;
		// let siQtty = parseInt($(this).closest('tr').find('td.product-price .product-si-qtty').val()) || 0;
		let totalQty = parseInt($('.total-product-qty').text()) || 0;
		// let oldTotalQty = parseInt($('.total-product-qty').text()) || 0;		
		totalQty += changeQty;
		$('.total-product-qty').text(totalQty);

		// let totalPrice = parseInt($('input[name="total-product-amount"]').val()) || 0;
		// if (totalQty >= siQtty && totalQty > oldTotalQty) {
		// 	totalPrice += (siPrice * changeQty);
		// } else if (totalQty >= siQtty && totalQty < oldTotalQty) {
		// 	totalPrice += (siPrice * changeQty);
		// } else if (totalQty < siQtty && totalQty > oldTotalQty) {
		// 	totalPrice += (basePrice * changeQty);
		// }else {
		// 	totalPrice += (basePrice * changeQty);
		// }
		// $('.total-product-amount').text(totalPrice.toLocaleString('en') + " VNĐ");
		// $('input[name="total-product-amount"]').val(totalPrice);
		$(e.currentTarget).closest('tr').find('td.product-quantity .hidden-qty').val($(this).val());
	})
	$('.quickview').on('click', function (e) {
		e.preventDefault();
		var productId = $(e.currentTarget).data('book-id');
		$.ajax({
			type: "POST",
			url: "/quick-view",
			data: {
				product_id: productId
			},
			dataType: "html",
			success: function (data) {
				$('#productModal .modal-body').html(data);
				// add touchSpin for html
				$(".quantity-product").TouchSpin({
					min: 0,
					max: 1000
				}).on('change', function (e) {
					let oldQty = $(this).closest('tr').find('td.product-quantity .hidden-qty').val()
					let changeQty = $(this).val() - oldQty;
					// let basePrice = parseInt($(this).closest('tr').find('td.product-price .product-amount').val()) || 0;
					// let siPrice = parseInt($(this).closest('tr').find('td.product-price .product-amount-si').val()) || 0;
					// let siQtty = parseInt($(this).closest('tr').find('td.product-price .product-si-qtty').val()) || 0;
					let totalQty = parseInt($('.total-product-qty').text()) || 0;
					totalQty += changeQty;
					$('.total-product-qty').text(totalQty);

					// let totalPrice = parseInt($('input[name="total-product-amount"]').val()) || 0;
					// if (totalQty >= siQtty) {
					// 	totalPrice = (siPrice * totalQty);
					// } else {
					// 	totalPrice = (basePrice * totalQty);
					// }
					// $('.total-product-amount').text(totalPrice.toLocaleString('en') + " VNĐ");
					// $('input[name="total-product-amount"]').val(totalPrice);
					$(e.currentTarget).closest('tr').find('td.product-quantity .hidden-qty').val($(this).val());
				});
				$(".product-color-list li a").on('click', function () { // Changes the .image-holder's img src to the src defined in .list a's data attribute.
					var value = $(this).attr('data-image-hover');
					$(".image-holder img").attr("src", value);
				});
				$('#productModal').modal('show');
			},
			error: function (data) {
				$('#productModal').modal('hide');
			}
		});
	});

});
