<style>
    .error-feedback{
        font-size: 0.9rem;
    }
</style>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Add New Record</h3>
                <p class="text-subtitle text-muted">
                    Add a new record to the database using the form below.
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php?page=dashboard">
                                DataTable
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Add New Record
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <!-- <form class="record-form" action="function/function.php?action=add" method="POST"> -->
        <form method="post" action="../controllers/Controller.php">
            <label for="first_name">First Name</label> <br>
            <input type="text" name="first_name" id="first_name" value="<?php echo isset($old_data['first_name']) ? htmlspecialchars($old_data['first_name']) : ''; ?>"><br>
            <span class="error-feedback"><?php echo $errors['first_name'][0] ?? ''; ?></span><br>


            <label for="dob">Date of Birth</label> <br>
            <input type="date" name="dob" id="dob" value="<?php echo isset($old_data['dob']) ? htmlspecialchars($old_data['dob']) : ''; ?>"><br>
            <span class="error-feedback"><?php echo $errors['dob'][0] ?? ''; ?></span><br>

            <input type="submit" value="Submit">
        </form>
    </section>
</div>