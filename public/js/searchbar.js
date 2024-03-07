const searchInput = document.getElementById('search-bar');
const content = document.getElementById('content');

searchInput.addEventListener('input', function (ev) { // On attend que l'utilisateur insert une recherche
    // Get the text from the searchbar
    const searchKey = searchInput.value;

    // Create a FormData object and append the text
    const formData = new FormData();

    formData.append('searchKey', searchKey);
    formData.append('search', '');

    // Make a POST request using the Fetch API
    fetch('index.php?page=home', {
        method: 'POST',
        body: formData,
    })
        .then(response => {
            response
                .text()
                .then(html => {
                    if (html.length > 0) {
                        content.innerHTML = html;
                    } else {
                        content.innerHTML = `
                    <div class="text-center" style="height: 55vh;">
                        <p>No result found!</p>
                    </div>`;
                    }
                });
        })
});