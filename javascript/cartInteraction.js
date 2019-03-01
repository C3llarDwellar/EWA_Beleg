function addToCart(sid, pid) {
    let amountLabel = $('#cartAmount');
    $.ajax({
        url: 'php/addToCart.php',
        type: 'POST',
        data: {uid: sid, produktId: pid},
        success: function (data) {
            if (data) {
                amountLabel.empty();
                amountLabel.append("added");
            } else {
                amountLabel.empty();
                amountLabel.append(data);
            }
        }
    });
}