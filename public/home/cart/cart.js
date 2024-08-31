function cartUpdate(event){
    event.preventDefault();
    let urlUpdateCart = $(this).data('url');
    let id = $(this).data('id');
    let quantity = $(this).val();
    
    $.ajax({
        type: "GET",
        url: urlUpdateCart,
        data: {
            id: id,
            quantity: quantity
        },
        success: function(data){
            if(data.code===200){
                $('.cart_wrapper').html(data.cart_view);
            }
        },
        error: function(){

        }
    })

}

function cartDelete(event){
    event.preventDefault();
    let urlDeleteCart = $(this).data('url');
    let id = $(this).data('id');
    
    $.ajax({
        type: "GET",
        url: urlDeleteCart,
        data: {
            id: id,
        },
        success: function(data){
            if(data.code===200){
                $('.cart_wrapper').html(data.cart_view);
            }
        },
        error: function(){

        }
    })
}

$(function(){
    $(document).on('change','.cart_quantity_input', cartUpdate);
    $(document).on('click','.cart_quantity_delete', cartDelete);
})