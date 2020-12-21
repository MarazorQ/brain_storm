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
        data: {
            money: money,
            sum: sum
        },
        success: function(data){
            if (data.status)
            {   
                let parsedArr = JSON.parse(data.result);

                $('table').empty();
                $('table').append('<tr><th>номинал</th><th>количество</th></tr>');

                for (const [key, value] of Object.entries(parsedArr)){
                    $('table').append('<tr><th>'+ key + '</th><th>' + value + '</th></tr>');
                }
            }else{
                $(`table`).addClass('msg none');
                $(`p`).removeClass('msg none');

                let parsedError = JSON.parse(data.result);
                
                $('p').empty;
                $('p').text('Неверная сумма. Выбирите' + parsedError[0] + 'или' + parsedError[1] + '.');
            }
        },
        error: function(res_err){
            
        }
    });

});
