$(document).on('change', ".custom_img", function() {
    readURL(this);
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('.my-product-img').addClass('img-uploaded');
            $(input).parent().find('img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$(document).on("click", ".p-img-remove", function() {
    //  to remove image       
    $(this).parent().find('img').attr('src','');
    $(this).parent().removeClass('img-uploaded');
    $(this).parent().find('input').val('');        
});