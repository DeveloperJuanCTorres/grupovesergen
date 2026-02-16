
    $(function() {
        $(document).on('click', '.addcart', function (e) {
			e.preventDefault();
            let token = $('meta[name="csrf-token"]').attr('content');
			var elemento = e.target;
            var id = this.getAttribute('data-id');  
            var qty = $('#qty').val();
		
            Swal.fire({
                header: '...',
                title: 'loading...',
                allowOutsideClick:false,
                didOpen: () => {
                    Swal.showLoading()
                }
            });

            $.ajax({
                url: "/add",
                method: "post",
                dataType: 'json',
                data: {
                    _token: token,
                    id: id,
                    qty: qty
                },
                success: function (response) {   
                    if (response.status) {
						document.getElementById('cartCount').innerText = response.count;
						
                        const Toast = Swal.mixin({
						toast: true,
						position: "top-start",
						showConfirmButton: false,
						timer: 3000,
						timerProgressBar: true,
						didOpen: (toast) => {
							toast.onmouseenter = Swal.stopTimer;
							toast.onmouseleave = Swal.resumeTimer;
						}
						});
						Toast.fire({
						icon: "success",
						title: response.msg
						});               
                    } else {
                        const Toast = Swal.mixin({
						toast: true,
						position: "top-end",
						showConfirmButton: false,
						timer: 3000,
						timerProgressBar: true,
						didOpen: (toast) => {
							toast.onmouseenter = Swal.stopTimer;
							toast.onmouseleave = Swal.resumeTimer;
						}
						});
						Toast.fire({
						icon: "error",
						title: "Algo salió mal" + response.msg
						});
                    }
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...!!',
                        text: 'Algo salió mal, Inténtalo más tarde!',
                    })
                }
            });
        });
    })



    $(document).on('click', '.btn-plus, .btn-minus', function(e){
    e.preventDefault();

    let rowId = $(this).data('rowid');
    let input = $('.qty-input[data-rowid="'+rowId+'"]');
    let qty = parseInt(input.val()) || 1;

    if($(this).hasClass('btn-plus')){
        qty++;
    } else {
        qty = qty > 1 ? qty - 1 : 1;
    }

    updateCart(rowId, qty);
});

function updateCart(rowId, qty){

    $.ajax({
        url: "/cart/update",
        method: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            rowId: rowId,
            qty: qty
        },
        success: function(response){

            if(response.status){

                // actualizar input
                $('.qty-input[data-rowid="'+rowId+'"]').val(qty);

                // actualizar subtotal fila
                $('.item-subtotal[data-rowid="'+rowId+'"]')
                    .text("S/. " + response.item_subtotal);

                // actualizar resumen
                $('#cartSubtotal').text("S/. " + response.subtotal);
                $('#cartIgv').text("S/. " + response.igv);
                $('#cartTotal').text("S/. " + response.total);

                // actualizar contador navbar
                $('#cartCount').text(response.count);
            }
        }
    });
}
