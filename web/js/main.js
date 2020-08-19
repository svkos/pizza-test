$(".cart-button").click(function() {
	$.ajax({
		   type: "POST",
		   url: "addtocart",
		   data: $(this.form).serialize(),
		   success: function(data){
			   alert(data);
		   }
		 });
	return false; 
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
