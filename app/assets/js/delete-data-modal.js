document.addEventListener("DOMContentLoaded", function() {
    var deleteModal = document.getElementById("deleteModal");
    var confirmDeleteBtn = document.getElementById("confirmDeleteBtn");

    deleteModal.addEventListener("show.bs.modal", function(event) {
        var button = event.relatedTarget;
        var userId = button.getAttribute("data-userid");

        // Update the delete link dynamically
        confirmDeleteBtn.href = `../controllers/Controller.php?delete_id=${userId}`;
    });
});