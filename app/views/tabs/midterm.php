<style>
    .error-feedback{
        font-size: 0.9rem;
    }
</style>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Table</h3>
                <p class="text-subtitle text-muted">
                    A table of all users with their respective information.
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            DataTable
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">Users Datatable</h5>
                <a href="index.php?page=insert" class="btn btn-primary ms-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-sm-block">+ Add New Record</span>
                </a>
            </div>
            <div class="card-body">
                <table id="table1" class="table table-striped">
                    <?php
                    $result = $model->get("midterm");
                    if ($result) : ?>
                    <thead>
                        <tr>
                            <th>📝 ID#</th>
                            <th>👨‍👩‍👧‍👦 Addresses</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row): ?>
                            <?php
                            $nametrim     = str_replace(",", "</br>", $row["id"]);
                            $birthtrim    = str_replace(",", "</br>", $row["address"]);  
                            ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo ucwords($birthtrim); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </section>
</div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Select Address</h5>
            </div>
            <div class="card-body">
                <form action="tabs/midterm.php" method="POST">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <select name="address" id="address" class="form-select">
                            <?php
                            $result = $model->get("midterm");
                            if ($result) : 
                                echo '<option value="">Select Address</option>';
                                foreach ($result as $row): 
                            ?>
                                <option value="<?php echo $row["address"]; ?>"><?php echo ucwords($row["address"]); ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
                <?php
                if (isset($_POST["submit"])) {
                    $address = $_POST["address"];
                    $result = $model->get("midterm", ["address" => $address]);
                    if ($result) : ?>
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $row): ?>
                                    <tr>
                                        <td><?php echo $row["id"]; ?></td>
                                        <td><?php echo ucwords($row["address"]); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif;
                }
                ?>
            </div>
        </div>
    </section>
