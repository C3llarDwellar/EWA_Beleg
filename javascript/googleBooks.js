function generateGoogleBooks(searchString) {
    let googleArea = $('#googleBooks');

    $.ajax({
        url: 'php/htmlGeneration.php',
        type: 'GET',
        data: {
            action: 'googleBooks',
            search: searchString
        },
        success: function (data) {
            googleArea.empty();
            googleArea.append(data);
        }
    })
}