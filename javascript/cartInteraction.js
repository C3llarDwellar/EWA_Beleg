function addToCart(sessionId, productId) {
    let amountLabel = $('#cartAmount');
    $.ajax({
        url: 'php/addToCart.php',
        type: 'POST',
        data: {
            uid: sessionId,
            productId: productId
        },
        success: function (data) {
            if (data === "added") {
                checkCartAmountForProduct(sessionId, productId);
                console.log("added book " + productId);
            } else {
                amountLabel.empty();
                amountLabel.append(data);
            }
        }
    });
}

function removeFromCart(sessionId, productId) {
    let amountLabel = $('#cartAmount');
    $.ajax({
        url: 'php/removeFromCart.php',
        type: 'POST',
        data: {
            uid: sessionId,
            productId: productId
        },
        success: function (data) {
            if (data === "removed") {
                checkCartAmountForProduct(sessionId, productId);
                console.log("removed book " + id);
            } else {
                amountLabel.empty();
                amountLabel.append(data);
            }
        }
    });
}

function checkCartAmount(sessionId) {
    let cartButton = $('#cartButton');
    $.ajax({
        url: 'php/checkCartAmount.php',
        type: 'POST',
        data: {
            uid: sessionId
        },
        success: function (data) {
            cartButton.empty();
            cartButton.append(data + " in cart");
        }

    });
}

function checkCartAmountForProduct(sessionId, productId) {
    let amountLabel = $('#cartAmount');
    $.ajax({
        url: 'php/checkCartAmountForProduct.php',
        type: 'POST',
        data: {
            uid: sessionId,
            productId: productId
        },
        success: function (data) {
            amountLabel.empty();
            if (data === "parameters not passed.") {
                amountLabel.append("Please log in first.")
            } else {
                amountLabel.append(data + " in cart");
            }
        }
    });
}