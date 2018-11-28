function loadCart(){
	$.get("loadCart.php",function(data){
		$("#loadCart").html(data);
	});
}

$(document).ready(function(){
	loadCart();
});

function changeNoItems(id){
	let items = $("#quantity" + id).val();
	let price = $("#price" + id).text();
	let newPrice = items * price;
	$("#subTotal" + id).html(newPrice);
	console.log("Sub Total is: " + newPrice);
	// let grandTotal = 
}