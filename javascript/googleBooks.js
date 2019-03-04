function generateGoogleBooks(searchString) {
    console.log("Google called");
    let googleArea = $('#googleBooks');

    $.ajax({
        url: 'https://www.googleapis.com/books/v1/volumes',
        type: 'GET',
        data: {
            q: searchString
        },
        success: function (data) {
            googleArea.empty();
            for (let i = 0; i < 10; i++) {
                let volume = data.items[i].volumeInfo;
                let title = volume.title;
                let isbn = volume.industryIdentifiers[0].identifier;
                let identifierType= volume.industryIdentifiers[0].type;
                let infoLink = volume.infoLink;
                let thumbnail = volume.imageLinks.smallThumbnail;

                $.ajax({
                    url: 'php/htmlGeneration.php',
                    type: 'GET',
                    data: {
                        action: 'googleBooks',
                        title: title,
                        isbn: isbn,
                        identifierType: identifierType,
                        infoLink: infoLink,
                        thumbnail: thumbnail
                    },
                    success: function (book) {
                        googleArea.append(book);
                    }
                });
            }
        }
    });
}