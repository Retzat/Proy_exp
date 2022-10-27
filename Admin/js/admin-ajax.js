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
/*//Eliminar un registro
$('.borrar_registro').on('click',function(){
    if(confirm('¿Estas seguro de eliminar este registro?')){
        var id=$(this).attr('data-id');
        var tipo=$(this).attr('data-tipo');
        console.log(id);
        /*var datos={
            'id':id,
            'registro':'eliminar'
        };
        $.ajax({
            type: 'post',
            data: datos,
            url: 'modelo-'+tipo+'.php',
            success: function(data) {
                console.log(data);
            } 
        })
    }    
});*/

//*/