document.getElementById("search-bar").addEventListener("input", function () {
    const query = this.value.toLowerCase();
    const articles = document.querySelectorAll("article");

    articles.forEach(article => {
        const text = article.innerText.toLowerCase();
        article.style.display = text.includes(query) ? "block" : "none";
    });
});
