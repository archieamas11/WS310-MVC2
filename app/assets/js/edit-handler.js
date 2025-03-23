document.addEventListener("DOMContentLoaded", function () {
    const editButtons = document.querySelectorAll(".edit-btn");

    editButtons.forEach(button => {
        button.addEventListener("click", function () {
            let userId = this.getAttribute("data-editId"); // Get user_id from button
            let form = document.getElementById("editForm");

            console.log(userId);

            // Update form action dynamically
            form.action = `../controllers/UserController.php?update_id=${userId}`;

            // Also update the hidden input field
            document.getElementById("edit-user-id").value = userId;
        });
    });
});