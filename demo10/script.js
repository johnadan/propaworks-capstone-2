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
	console.log(items);
	let price = $("#price" + id).text();
	console.log(price);
	let newPrice = items * price;
	$("#subTotal" + id).html(newPrice);
	console.log("Sub Total is: " + newPrice);

	let grandTotal = 0;
	$('.sub-total').each(function(){
		grandTotal += parseFloat($(this).text());
	});
	$("#grandTotal").html(grandTotal);

}

function removeFromCart(id){
	var answer = confirm("Remove item from cart?");
	if(answer){
		// alert("You answered Yes");
		$.ajax({
			url:"removeFromCart.php",
			method:"POST",
			data:
			{
				productId:id
			},
			dataType:"text",
			success:function(data){
				$('a[href="cart.php"]').html(data);
				loadCart();
			}
		});
	}
}

// $(document).ready(()=>{
// 	$('btnRemove').click(() => {
// 		document.getElementById("#cartItems").remove();
// 	});
// });	