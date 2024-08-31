function addToCart(event){
    event.preventDefault();
    let urlCart=$(this).data('url');

    $.ajax({
        type: "GET",
        url: urlCart,
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{
            quantity: 1
        },
        success: function (data){
            if(data.code === 200){
                // alert('Thêm Sản Phẩm Thành Công');
            }
        },
        error: function(){    
        }
    });
}

function addFromDetailToCart(event){
    event.preventDefault();
    let urlCart=$(this).data('url');
    let quantity=$(this).parents('span').find('input.input_quantity').val();
    $.ajax({
        type: "GET",
        url: urlCart,
        dataType: 'json',
        data:{
            quantity:quantity
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data){
            if(data.code === 200){
                // alert('Thêm Sản Phẩm Thành Công');
            }
        },
        error: function(){    
        }
    });
}

$(function(){
    $(".add_to_cart").on('click', addToCart);
    $(".add_cart").on('click', addFromDetailToCart)
});
