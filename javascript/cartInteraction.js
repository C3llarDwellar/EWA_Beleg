function addToCart(sid, pid) {
    let amountLabel = $('#cartAmount');
    $.ajax({
        url: 'php/addToCart.php',
        type: 'POST',
        data: {uid: sid, productId: pid},
        success: function (data) {
            if (data === "added") {
                checkCartAmount(sid, pid);
                console.log("added book " + pid);
            } else {
                amountLabel.empty();
                amountLabel.append(data);
            }
        }
    });
}

function removeFromCart(sid, pid) {
    let amountLabel = $('#cartAmount');
    $.ajax({
        url: 'php/removeFromCart.php',
        type: 'POST',
        data: {uid: sid, productId: pid},
        success: function (data) {
            if (data === "removed") {
                checkCartAmount(sid, pid);
                console.log("removed book " + id);
            } else {
                amountLabel.empty();
                amountLabel.append(data);
            }
        }
    });
}

function checkCartAmount(sid, pid) {
    let amountLabel = $('#cartAmount');
    $.ajax({
        url: 'php/checkCartAmount.php',
        type: 'POST',
        data: {uid: sid, productId: pid},
        success: function (data) {
            amountLabel.empty();
            amountLabel.append(data + " in cart");
        }
    });
}