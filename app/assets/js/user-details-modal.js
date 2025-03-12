document.addEventListener('DOMContentLoaded', function () {
    // Get all view buttons
    const viewButtons = document.querySelectorAll('.view-btn');

    // Add click event listener to each button
    viewButtons.forEach(button => {
        button.addEventListener('click', function () {
            const userId = this.getAttribute('data-id');

            // Validate userId
            if (!userId) {
                console.error('User ID is missing');
                alert('Invalid user ID');
                return;
            }

            // Make AJAX request to get user data
            fetch(`../controllers/Controller.php?retrieve_id=${userId}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Server returned ${response.status}: ${response.statusText}`);
                    }
                    return response.json();
                })
                .then(data => {
                    // Validate response data
                    if (!data || !Array.isArray(data) || data.length === 0) {
                        throw new Error('Invalid data received from server');
                    }

                    // Debug: Log the data to the console
                    console.log('Received data:', data);

                    // Helper function to safely populate fields
                    const populateField = (elementId, value, fallback = 'N/A') => {
                        const element = document.getElementById(elementId);
                        if (element) {
                            element.textContent = value || fallback;
                        } else {
                            console.warn(`Element with ID ${elementId} not found`);
                        }
                    };

                    // Access the first object in the array
                    const userData = data[0];

                    // Populate modal fields with data
                    populateField('view_full_name', userData.user_full_name);
                    populateField('view_dob', userData.date_of_birth);
                    if (userData.date_of_birth) {
                        const dob = new Date(userData.date_of_birth);
                        const age = new Date().getFullYear() - dob.getFullYear();
                        populateField('view_age', age);
                    } else {
                        populateField('view_age', null);
                    }
                    populateField('view_sex', userData.sex);
                    populateField('view_civil_status', userData.civil_status);
                    populateField('view_pob', userData.place_of_birth);
                    populateField('view_nationality', userData.nationality);
                    populateField('view_religion', userData.religion);
                    populateField('view_tin', userData.tax_identification_number);
                    populateField('view_phone', userData.phone_number);
                    populateField('view_telephone', userData.telephone_number);
                    populateField('view_email', userData.email_address);
                    populateField('view_region', userData.region);
                    populateField('view_province', userData.province);
                    populateField('view_municipality', userData.municipality);
                    populateField('view_barangay', userData.barangay);
                    populateField('view_address', userData.home_address);
                    populateField('view_zip', userData.zip_code);
                    populateField('view_father', userData.fathers_full_name);
                    populateField('view_mother', userData.mothers_full_name);
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to load user data. Please try again.');
                });
        });
    });
});