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

  //   $('.venue_header dl').first().addClass('active');
  // $('.date_list').first().removeClass('hide');
  //  // $('.time').removeClass('hide');
  //   $('.time li').first().removeClass('hide');
  //   $('.venue_header dl').click(function () {
  //       $(this).addClass('active').siblings().removeClass('active');
  //
  //       var index=$(this).index();
  //
  //       $('.date_list').eq(index).removeClass('hide').siblings('date_list').addClass('hide');
  //       $('.time li').eq(index).removeClass('hide').siblings().addClass('hide');
  //   })

    $(".venue_header dl").first().addClass("active");
    $(".day_list").first().addClass("active");

    $(".venue_header dl").click(function () {

        var date=$(this).find('dt').html();
        $('.order-date').html(date);

        // $('.order_date').find('span').html(cur_date);

        $(".venue_header dl").removeClass("active");
        $(this).addClass("active");


        var index = $(this).index();


        $(".day_list").removeClass("active");
        $(".day_list").eq(index).addClass("active");

    })

    $('.tab ul').find('li:not(.ordered)').click(function () {


        $field=$(this).attr('data-field');
        $time=$(this).attr('data-time');
        $mark=$time+"_"+$field;
        if ($(this).hasClass('selected')){
            $(this).removeClass('selected')
            $('.order-detail dl[mark='+$mark+']').remove();
        } else {

            $selected_length=$('.tab ul li.selected').length;
            if ($selected_length==4){
                $('#my_modal').modal();
                return false;
            }
            $(this).addClass('selected')
            //console.log($field,$time);
            var item=$('.template').html();
            console.log(item)
            var $item=$(item);
//
            $item.attr('mark',$mark);
            $item.find('dt').html($time+":00");
            //console.log($time);
            $item.find('dd').html("场地:"+$field);
            $('.order-detail').append($item);

        }
    })

    $('.order_btn').click(function () {
        var order={};
        var order_date=$('.order-date').html();
        var venue_id=$('.venue_id').val();
        console.log(order_date,venue_id);
        var list=[];
        order.order_date=order_date;
        order.venue_id=venue_id;

        $('.order-detail .item').each(function (index,item) {
            //console.log(item);
            var $item=$(item);
            //console.log(item)
            var mark_str=$item.attr('mark');
            var obj={};
            console.log(mark_str)
            var temp=mark_str.split("_");
            //console.log(temp);
            obj.field=temp[1];
            obj.order_time=temp[0];
            list.push(obj);
           // console.log(mark_str);
        })
        //console.log(list);
        order.list=list;
        if (order==''){
            return;
        }
        $.ajax({
            url:"http://www.yutang.test/order/save",
            type:"POST",
            data: order,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success:res=>{
                console.log(res);
            }
        })
    })
})