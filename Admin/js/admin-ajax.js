/*$(document).ready(function() {
    $('#crear-admin').on('submit', function(e) {
        e.preventDefault();
        console.log('click');
        var datos=$(this).serializeArray();
        //console.log(datos);
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
                console.log(data);
            } 
        })
    });
});*/