let logoutButton = document.getElementById('logout'),
    newItemButton = document.getElementById('newItem'),
    addItemForm = document.getElementById('newItemForm').parentElement,
    addItemButton = document.getElementById('addNewItem'),
    closeAddItem = document.getElementById('closeAddItem'),
    searchItems = [],
    allItems = [];

// call userController with action logout if user wants to logout
logoutButton.addEventListener('click', function() {
    $.ajax({
        url: './php/userController.php?action=logout',
        type: 'POST',
        success: function() {
            // reload Page
            location.reload();
        }
    });
});

// get items user are searching for from db
$.ajax({
    url: './php/itemController.php?action=getItems',
    type: 'GET',
    success: function(data) {
        // set up json
        let jsonData = data;

        while(jsonData.charAt(0) !== '['){
            jsonData = jsonData.substring(1);
        }
        jsonData = jsonData.replaceAll('}]"', '}]');
        jsonData = (JSON.parse(jsonData));

        // set seachItems = items user is searching for
        searchItems = jsonData;
    }, error: function(error) {
        console.log(error);
    }
});

// get all items from SkinPort in Json
$.ajax({
    url: './php/getAllItems.php',
    type: 'POST',
    success: function(data) {
        let jsonData = data;

        while(jsonData.charAt(0) !== '['){
            jsonData = jsonData.substring(1);
        }
        jsonData = jsonData.replaceAll('}]"', '}]');
        jsonData = (JSON.parse(jsonData));

        // foreach item we got
        jsonData.forEach(item => {
            // for each item user is seaching
            searchItems.forEach(searchItem => {
                // if Item user is seaching for matches with item we got
                if (item["market_hash_name"] == searchItem["itemName"]) {
                    console.log(searchItem["itemName"]);
                    // get details from item
                    $.ajax({
                        crossDomain: true,
                        url: 'php/getItems.php',
                        type: 'POST',
                        data: {
                            itemName: item["market_hash_name"]
                        }, success: function(data){
                            // set up json
                            let jsonData = data;
                    
                            while(jsonData.charAt(0) !== '['){
                                jsonData = jsonData.substring(1);
                            }
                            jsonData = jsonData.replaceAll('}}]"', '}}]');
                            jsonData = (JSON.parse(jsonData));
                            
                            // foreach item we are seaching for and got details
                            jsonData.forEach(element => {
                                let itemURL = item["item_page"];
                                // call printItem to get html with item details
                                $.ajax({
                                    crossDomain: true,
                                    url: 'php/printItem.php',
                                    type: 'POST',
                                    data: {
                                        itemName: element["market_hash_name"],
                                        sevenDays: element["last_7_days"],
                                        thirtyDays: element["last_30_days"],
                                        ninetyDays: element["last_90_days"],
                                        itemID: searchItem["id"],
                                        itemPrice: item["min_price"],
                                        itemPicture: searchItem["itemPicture"],
                                        steamPrice: item["suggested_price"],
                                        pageURL: item["item_page"]
                                    }, success: function(itemhtml){
                                        // create html element and append class with html we got from php call
                                        let item = document.createElement("a"),
                                            items = document.getElementById('items');
                        
                                        // set up link for item
                                        $(item).html(itemhtml);
                                        item.classList.add('item');
                                        item.href = itemURL;
                                        item.target = '_blank'

                                        // create event for deleting seachItem
                                        item.childNodes[0].nextSibling.addEventListener('click', function() {
                                            // call itemController with deleteItem parameter
                                            $.ajax({
                                                url: './php/itemController.php?action=deleteItem',
                                                type: 'POST',
                                                data: {
                                                    itemID: this.id
                                                }, success: function() {
                                                    // reload page
                                                    location.reload();
                                                }, error: function(error) {
                                                    console.log(error);
                                                }
                                            });
                                        });
                                        
                                        // append item to items in document
                                        items.append(item);

                                        // sort items from green to orange
                                        let orangeItems = document.querySelectorAll('.orange');
                                        let yellowItems = document.querySelectorAll('.yellow');
                                        let greenItems = document.querySelectorAll('.green');
                                        orangeItems.forEach(element => {
                                            items.prepend(element.parentElement);
                                        });
                                        
                                        yellowItems.forEach(element => {
                                            items.prepend(element.parentElement);
                                        });

                                        greenItems.forEach(element => {
                                            items.prepend(element.parentElement);
                                        });
                                    }, error: function(error) {
                                        console.log(error);
                                    }
                                })
                            });
                        }, error: function(error) {
                            console.log(error);
                        }
                    });
                }
            });
        });
    }
});

// set event to show newItem
newItemButton.addEventListener('click', function() {
    addItemForm.classList.add("show");
});

// set event to insert a new searchItem
addItemButton.addEventListener('click', function() {
    // set variables
    let $weapponName = document.getElementById('weaponName').value,
        $weapponSkin = document.getElementById('weaponSkin').value,
        $weapponCondition = document.getElementById('weaponCondition').value,
        $itemPicture = document.getElementById('itemPicture').value;

    // call itemController with parameter insert and insert new searchItem
    $.ajax({
        url: './php/itemController.php?action=insert',
        type: 'POST',
        data: {
            itemName: $weapponName + ' | ' + $weapponSkin + ' (' + $weapponCondition + ')',
            itemPicture: $itemPicture
        }, success: function() {
            // Reload page
            location.reload();
        }, error: function(error) {
            console.log(error);
        }
    });
});

// set event to close the newItem page
closeAddItem.addEventListener('click', function() {
    addItemForm.classList.remove('show');
});