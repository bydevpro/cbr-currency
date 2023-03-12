setInterval(function(){
    $.ajax({
        url: "/getdata",
        dataType: "json",
        success: function(data) {
            
            // Clear the currency-data element outside the loop
            $('#currency-data').empty();
            $('#currency1').empty();
            $('#currency2').empty();
            // Loop through the data and append each row to the currency-data element
            for (var i = 0; i < data.length; i++) {
                var row = data[i];
                const datetime = new Date(row['updated_at']);
                const dateString = datetime.toLocaleDateString();
const timeString = datetime.toLocaleTimeString();
const formattedDatetime = dateString + ' ' + timeString;

                var currency = $('<div class="currency"></div>');
                currency.append('<h5 class="card-title"><span class="currency-charcode">' + row['currentCode'] + '</span></h5>');
                currency.append('<p class="card-text"><span class="currency-name">' + row['currentName'] + '</span></p>');
                var body = $('<div class="card-body"></div>');
                body.append('<ul class="list-group list-group-flush"><li class="list-group-item"><span class="currency-value">' + row['currentValue'].toFixed(4).toString() + ' руб.</span></li></ul>');
                currency.append(body);
                currency.append('<div class="card-footer text-muted">' + formattedDatetime + '</div>');
                let option = `<option value="${row['currentValue'].toFixed(4)}">${row['currentCode']}</option>`;
    $('#currency1').append(option);
    $('#currency2').append(option);
                // Append the final currency element to the currency-data element
                $('#currency-data').append(currency);
            }
                

       
        }
    });
}, 5000);