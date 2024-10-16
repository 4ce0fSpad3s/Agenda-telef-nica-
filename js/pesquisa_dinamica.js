function pesquisar(element) {
    const input = element.value.trim(); // Get the input value and trim whitespace

    // Only proceed if the input is not empty
    if (input) {
        // Use encodeURIComponent to safely encode the input for the URL
        const encodedInput = encodeURIComponent(input);
        window.location.href = `pesquisa_dinamica.php?pesquisa=${encodedInput}`;
    }
}

// Example of how to attach the search function to an input field
document.getElementById('searchInput').addEventListener('keyup', function() {
    pesquisar(this);
});