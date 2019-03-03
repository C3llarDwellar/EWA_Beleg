function addToCart(sessionId, productId) {
    console.log("addToCart() called with sessionId: " + sessionId + " and productId: " + productId);
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
    fillCartModal();
}

function removeFromCart(sessionId, productId) {
    console.log("removeFromCart() called with sessionId: " + sessionId + " and productId: " + productId);
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
    fillCartModal();
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

function fillCartModal() {
    let cartContent = $('#cartContent');
    $.ajax({
        url: 'php/htmlGeneration.php',
        type: 'GET',
        data: {
            action: 'fillCart',
            sessionId: sessionStorage['uid']
        },
        success: function (data) {
            cartContent.empty();
            cartContent.append(data);
        }
    })
}

function checkOut() {
    $.ajax({
        url: 'php/emptyCart.php',
        type: 'GET',
        data: {},
        success: function (data) {
            checkCartAmount();
            $('#cartModal').modal('hide');
        }
    })
}

function checkCreditCard() {
    let ccNumber = $('#ccNumber').val();
    let ccLabel = $('#ccResult');
    $.ajax({
        url: 'php/ws_client.php',
        type: 'POST',
        data: {ccNumber: ccNumber},
        success: function (data) {
            if (data === 'true') {
                ccLabel.empty();
                ccLabel.append("Credit Card valid");
            } else {
                ccLabel.empty();
                ccLabel.append("Credit Card invalid");
            }
        }
    })
}