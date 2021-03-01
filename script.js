$(document).ready(() => {
    $('body').on('focus', 'input', (e) => {
        $(e.target).removeClass('desfocado')
        $(e.target).addClass('focado')
    })

    $('body').on('blur', 'input', (e) => {
        $(e.target).removeClass('focado')
        $(e.target).addClass('defocado')
    })

   $('input').keydown(function(e) {
    if(e.which == 32 || e.which == '') {
        $(e.target).removeClass('desfocado')
        $(e.target).addClass('focado')
    } else {
        $(e.target).removeClass('focado')
        $(e.target).addClass('defocado')
    }
   })

})