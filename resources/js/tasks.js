document.querySelectorAll(".toggle-complete").forEach((switchElement) => {
    switchElement.addEventListener("change", function () {
        let taskId = this.getAttribute("data-task-id");
        let isChecked = this.checked;

        axios
            .patch(`/tasks/${taskId}/toggle-complete`, {
                _token: document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            })
            .then(function (response) {
                console.log("Task aggiornato con successo.");

                // Aggiorna il testo di stato nella vista
                let statusText = switchElement
                    .closest("tr")
                    .querySelector(".status-text");

                if (isChecked) {
                    statusText.textContent = "Completato";
                    statusText.classList.remove("text-bg-danger");
                    statusText.classList.add("text-bg-primary");
                } else {
                    statusText.textContent = "Non Completato";
                    statusText.classList.remove("text-bg-primary");
                    statusText.classList.add("text-bg-danger");
                }
            })
            .catch(function (error) {
                console.error(error.response.data);
            });
    });
});
