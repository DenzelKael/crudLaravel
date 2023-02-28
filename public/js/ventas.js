var productos = ['uno', 'dos', 'tres', 'cuatro', 'cinco']


var x = $('#search').autocomplete({
    // source: [ { label: "Choice1", value: "value1" }],
    source: function (request, response) {
        $.ajax({
            url: "producto/productos",
            method: 'GET',
            dataType: 'json',
            data: {
                term: request.term
            },
            success: function (productos) {

                response(productos.data)
                $('#ui-id-1').find('div').css('color', 'red')
                console.log(productos.data)
            }
        })
    },
    select: function (event, ui) {
    
        setInterval(() => {
            $('#search').val(ui.item.label)
        }, 100);

    },
})


// $('#ui-id-1').on('click',(e)=>{
//     console.log(e.target.innerHTML)
// })

$('#ui-id-1').find('div').css('color', 'red')



$('#ui-id-1').css({
    'z-index': '1100'
})

/* 
 $('#search ').on(' keypress', function (e) {

    if (e.which == 13) {
       var x = document.querySelectorAll('.ui-menu-item')
    console.log(x);

    }
});  */

