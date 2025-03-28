<div class="modal fade modal-xl" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33">
    <div class="modal-dialog modal-dialog-centered modal-dialog" role="document">
        <div class="modal-content">
            <form class="record-form" id="editForm" action="../../controllers/UserController.php" method="POST">
                <div class="modal-body p-3">
                <input type="text" name="user_id" id="edit-user-id" placeholder="Empty" hidden>
                <input type="text" name="update" value="1" id="edit-update" placeholder="Empty" hidden>
                    <div class="row gy-3 p-3">
                        <div class="modal-title">
                            <h2>Edit User</h2>
                            <p>Update user information. Click save changes when you're done.</p>
                        </div>
                            <div class="col-12 col-md-4">
                                <label>Full Name</label>
                                <input type="text" name="full_name" id="edit-name" class="form-control form-control-lg" placeholder="Empty">
                                <span class="error-feedback text-danger"></span>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Date of Birth</label>
                                <input type="date" name="dob" id="edit-dob" class="form-control form-control-lg" placeholder="Empty">
                                <span class="error-feedback text-danger"></span>
                            </div>  
                            <div class="col-12 col-md-4">
                                <label>Sex</label>
                                <div style="width: 100%; height: 38px;" class="d-flex align-items-center gap-3">
                                    <input type="radio" name="sex" value="male" id="edit-sex-male">
                                    <label for="edit-sex-male">Male</label>
                                    <input type="radio" name="sex" value="female" id="edit-sex-female">
                                    <label for="edit-sex-female">Female</label>
                                </div>
                                <span class="error-feedback text-danger"></span>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Civil Status</label>
                                <select name="civil_status" id="edit-status" class="form-select form-control-lg">
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="widowed">Widowed</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="others">Others</option>
                                </select>
                                <input type="text" id="otherStatus" name="otherStatus" placeholder="Enter civil status" style="display: none;" onblur="resetDropdown()" class="form-control form-control-lg" />
                                <span class="error-feedback text-danger"></span>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Nationality</label>
                                <input type="text" name="nationality" id="edit-nationality" class="form-control form-control-lg" placeholder="Empty">
                                <span class="error-feedback text-danger"></span>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Religion</label>
                                <input type="text" name="religion" id="edit-religion" class="form-control form-control-lg" placeholder="Empty">
                                <span class="error-feedback text-danger"></span>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Place of Birth</label>
                                <input type="text" name="place_of_birth" id="edit-birth-place" class="form-control form-control-lg" placeholder="Empty">
                                <span class="error-feedback text-danger"></span>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Tax Number</label>
                                <input type="number" name="tin" id="edit-tax-number" class="form-control form-control-lg" placeholder="Empty">
                                <span class="error-feedback text-danger"></span>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Phone Number</label>
                                <input type="number" name="contact_number" id="edit-phone" class="form-control form-control-lg" placeholder="Empty">
                                <span class="error-feedback text-danger"></span>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Telephone Number</label>
                                <input type="text" name="telephone_number" id="edit-telephone" class="form-control form-control-lg" placeholder="Empty">
                                <span class="error-feedback text-danger"></span>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Email Address</label>
                                <input type="email" name="email_address" id="edit-email" class="form-control form-control-lg" placeholder="Empty">
                                <span class="error-feedback text-danger"></span>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Home Address</label>
                                <input type="text" name="home_address" id="edit-home-address" class="form-control form-control-lg" placeholder="Empty">
                                <span class="error-feedback text-danger"></span>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Region</label>
                                <select id="edit-region" name="region_code" class="form-select form-control-lg" onchange="loadProvinces(this.value)">
                                    <option value="">Select region</option>
                                </select>
                                <input type="text" class="form-control form-control-lg" name="region_name" id="edit-region-name" value="" placeholder="Empty" readonly>
                                <span class="error-feedback text-danger"></span>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Province</label>
                                <select id="edit-province" name="province_code" class="form-control form-control-lg" onchange="loadMunicipalities(this.value)">
                                    <option value="">Select region first</option>
                                </select>
                                <input type="text" class="form-control form-control-lg" name="province_name" id="edit-province-name" value="" placeholder="Empty" readonly>
                                <span class="error-feedback text-danger"></span>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Municipality</label>
                                <select id="edit-municipality" name="municipality_code" class="form-control form-control-lg" onchange="loadBarangays(this.value)">
                                    <option value="">Select province first</option>
                                </select>
                                <input type="text" class="form-control form-control-lg" name="municipality_name" id="edit-municipality-name" value="" placeholder="Empty" readonly>
                                <span class="error-feedback text-danger"></span>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Barangay</label>
                                <select id="edit-barangay" name="barangay_code" class="form-control form-control-lg">
                                    <option value="">Select municipality first</option>
                                </select>
                                <input type="text" class="form-control form-control-lg" name="barangay_name" id="edit-barangay-name" value="" placeholder="Empty" readonly>
                                <span class="error-feedback text-danger"></span>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Zip Code</label>
                                <input type="text" name="zipcode" id="edit-zipcode" class="form-control form-control-lg" placeholder="Empty">
                                <span class="error-feedback text-danger"></span>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Father's Full Name</label>
                                <input type="text" name="fathers_full_name" id="edit-father-name" class="form-control form-control-lg" placeholder="Empty">
                                <span class="error-feedback text-danger"></span>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Mother's Full Name</label>
                                <input type="text" name="mothers_full_name" id="edit-mother-name" class="form-control form-control-lg" placeholder="Empty">
                                <span class="error-feedback text-danger"></span>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ms-1" name="btn-update">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Save Changes</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
