function shop(object){
    $.post('shop.php', {item: object.id}, function(data){
        $("#response").html(data);
    })
}

function hunt(){
    $.post('hunt.php', function(data){
        $("#response").html(data);
    })
}

function getInventory() {
    $.post('inventory.php', function(data) {
        $("#response").html(data);
    })
}