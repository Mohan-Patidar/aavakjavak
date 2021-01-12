// $(window).load(function() {
//     $('.nav-list').addClass('active');
// });
// $(ducument).ready(function() {

//     $('.nav-list').click(function() {
//         $('.nav-list.active').removeClass('active');
//         $(this).addClass('active');
//     });
// })

$(document).ready(function() {
    $('li').on('click', function() {
        //alert('clicked');
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
    });
});