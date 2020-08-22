function remove(id){
	$.ajax({
		type: "POST",
		url: "remove-from-cart",
		data: {id_product: id},
		success: function(data){
			location.reload();
		}
	});
}
function subQuantity(id){
	$.ajax({
		type: "POST",
		url: "sub-quantity",
		data: {id_product: id},
		success: function(data){
			location.reload();
		}
	});
}
function refreshSmallCart(){
	$.ajax({
		url: "get-small-cart",
		success: function(data){
			$('#small-cart').html(data);
		}
	});
	
}
$(document).ready(function() {
    refreshSmallCart();
});

$(".cart-button").click(function() {
	$.ajax({
		   type: "POST",
		   url: "addtocart",
		   data: $(this.form).serialize(),
		   success: function(data){
			   refreshSmallCart();
		   }
		 });
	return false; 
});
$(".check-button").click(function() {
	$.ajax({
	   type: "POST",
	   url: "get-orders",
	   data: { phone : $('#orders-phone').val() },
	   success: function(data){
		   $('#orders').html(data);;
	   }
	});
	return true; 
});
$(".input").click(function() {
	var img = $(this.form).find('img');
	var price = $(this.form).find('#price');
	$.ajax({
		type: "POST",
		url: "get-image",
		data: $(this.form).serialize(),
		success: function(data){
			img.attr('src',data);
		}
	});
	$.ajax({
		type: "POST",
		url: "get-price",
		data: $(this.form).serialize(),
		success: function(data){
			price.text(data);
		}
	});
	return true;
});
$("#change-currency").click(function() {
	$.ajax({
		url: "change-currency",
		success: function(data){
			location.reload();
		}
	});
});	
$(".remove").click(function() {
	remove(this.id);
});
$(".minus-button").click(function() {
	var quantity = $(this.nextElementSibling).text();
	if(quantity > 1)
		subQuantity(this.id);
	else
		remove(this.id);
});

$(".plus-button").click(function() {
	$.ajax({
		type: "POST",
		url: "add-quantity",
		data: {id_product: this.id},
		success: function(data){
			location.reload();
		}
	});
});
$(".icon").click(function() {
	var opacity = $(this.nextElementSibling).css('opacity');
	if(opacity == 0)
		$(this.nextElementSibling).fadeTo("fast" , 1);
	else
		$(this.nextElementSibling).fadeTo("fast" , 0);
});