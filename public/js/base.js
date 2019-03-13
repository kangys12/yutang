$(function () {
    $('.price-btn').click(function () {
        var parmas={};
        var id=$(this).attr('data-id');
        var price=$(this).parents('tr').find('input').val();
        parmas.id=id;
        parmas.price=price;
        $.ajax({
            url:"http://www.yutang.test/price/save",
            type:"POST",
            data: parmas,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success:res=>{
                console.log(res);
            }
        })
    })
})