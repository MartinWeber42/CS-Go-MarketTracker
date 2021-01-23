let logoutButton = document.getElementById('logout');

logoutButton.addEventListener('click', function() {
    $.ajax({
        url: './php/userController.php?action=logout',
        type: 'POST',
        success: function() {
            location.reload();
        }
    });
})

$.ajax({
    crossDomain: true,
    url: 'php/dashboardController.php',
    type: 'GET',
    success: function(data){

        let jsonData = data;

        while(jsonData.charAt(0) !== '['){
            jsonData = jsonData.substring(1);
        }
        jsonData = jsonData.replaceAll('}}]"', '}}]');
        jsonData = (JSON.parse(jsonData));

        console.log(jsonData[0]["market_hash_name"])

        $.ajax({
            crossDomain: true,
            url: 'php/item.php',
            type: 'POST',
            data: {
                itemName: jsonData[0]["market_hash_name"]
            }, success: function(item){
                document.getElementById('items').append(item);
            }, error: function(error) {
                console.log(error);
            }
        })

    }, error: function(error) {
        console.log(error);
    }
})