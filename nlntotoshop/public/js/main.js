/*==================================================================
[ Show modal ]*/
$('.js-show-modal').on('click',function(e){
    e.preventDefault();
    var sp_ma = $(this).data('sp-ma');
    $(`.js-modal-${sp_ma}`).addClass('show-modal1');
});
$('.js-hide-modal').on('click',function(){
    var sp_ma = $(this).data('sp-ma');
    $(`.js-modal-${sp_ma}`).removeClass('show-modal1');
});