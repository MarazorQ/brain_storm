/*
    получения данных с формы и отправка на php скрипт
 */


$('.btn').click(function (e) {
    e.preventDefault();

   $(`table`).removeClass('msg none');

    let money = $('input[name="money"]').val().split(','),
        sum = $('input[name="sum"]').val();
  
    $.ajax({
        url: 'scripts/get_money.php',
        type: 'POST',
        //dataType: 'json',
        data: {
            money: money,
            sum: sum
        },
        success: function(result){
           alert(result);
           console.log("data");
        }
    });

});
