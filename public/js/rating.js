jQuery(document).ready(function($){
    $(".star").click(function (e) { 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        console.log(e);
        e.preventDefault();
        var formData = {
            rating: $(this).attr('value'),
        };
        var state = $(this).attr('value');
        var type = "POST";
        var ajaxurl = 'rating';
        console.log(formData);
        console.log(state);
        console.log(ajaxurl);
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data)
                console.log(data.id)
                console.log(state)
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});