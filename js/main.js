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
            let parsedArr = JSON.parse(result);
            $('table').empty();
            $('table').append('<tr><th>номинал</th><th>количество</th></tr>');
            for (const [key, value] of Object.entries(parsedArr))
            {
                $('table').append('<tr><th>'+ key + '</th><th>' + value + '</th></tr>');
            }
        }
    });

});
