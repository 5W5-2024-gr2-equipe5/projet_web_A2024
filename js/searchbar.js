document.addEventListener("DOMContentLoaded", function() {
    const searchForm = document.querySelector('form.recherche');
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            const searchInput = searchForm.querySelector('input.recherche__input');
            if (searchInput && searchInput.value.trim() === "") {
                e.preventDefault(); // Stop the form submission
                alert("Veuillez entrer des termes de recherche."); // Optional: Provide user feedback
            }
        });
    }
});

document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.querySelector('.recherche__input');
    const resultsContainer = document.querySelector('.search-results-content');

    if (searchInput && resultsContainer) {
        searchInput.addEventListener('input', function() {
            const query = searchInput.value;

            if (query.length > 2) { // Start search after 3 characters
                fetch(`/wp-admin/admin-ajax.php?action=live_search&query=${encodeURIComponent(query)}`)
                    .then(response => response.json())
                    .then(data => {
                        resultsContainer.innerHTML = data.results.map(post => `
                            <div class="post-item">
                                <h3>${post.title}</h3>
                                <p>${post.excerpt}</p>
                            </div>
                        `).join('');

                    const postTitles = document.querySelectorAll(".post-item");
                    for (let post of postTitles) {
                        post.style.color = "var(--color4)"
                    };

                });
            } else {
                resultsContainer.innerHTML = ''; // Clear results if query is empty
            }
        });
    }
});