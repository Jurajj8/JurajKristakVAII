function deleteTorta(tortaId) {
    if (confirm("Naozaj chcete zmazať tortu?")) {
        // Přidání CSRF tokenu
        axios.defaults.headers.common["X-CSRF-TOKEN"] = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");

        axios
            .delete(`/torty/${tortaId}`)
            .then((response) => {
                // Tu môžete aktualizovať zobrazenie alebo vykonať ďalšie kroky
                console.log(response.data);
            })
            .catch((error) => {
                console.error("Chyba pri odstraňovaní torty:", error);
            });
    }
}

export default deleteTorta;
