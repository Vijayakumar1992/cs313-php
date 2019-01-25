function addToCart(item, price) {
    var httpRequest = new XMLHttpRequest();
    httpRequest.open("GET", "cart.php?action=add&item=" + item + "&price=" + price, true);
    httpRequest.send();
}