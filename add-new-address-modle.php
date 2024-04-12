<div class="modal fade" id="AddNewAddress" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Add New Address</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <label for="ad_name" class="form-label">Name <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="ad_name" required />
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="ad_name" class="form-label">Mobile <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="ad_pn" required />
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="ad_line1" class="form-label">Flat, House no, Building,
                                        Company, Apartment <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="ad_line1" required />
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="ad_line2" class="form-label">Area, Colony, Street, Sector,
                                        Village <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="ad_line2" required />
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="ad_district" class="form-label">District <small class="text-danger">*</small></label>
                                    <select id="ad_district" class="form-select" onchange="getCitys();" required>
                                        <option value="0">Select State</option>

                                        <?php
                                        $getDistrict = Database::search("SELECT * FROM `district`;");

                                        if ($getDistrict->num_rows !== 0) {

                                            for ($i = 0; $i < $getDistrict->num_rows; $i++) {

                                                $row = $getDistrict->fetch_assoc();

                                                echo ("<option value=" . $row["district_id"] . ">" . $row["district_name"] . "</option>");
                                            }
                                        }

                                        ?>

                                    </select>
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="ad_city" class="form-label">City <small class="text-danger">*</small></label>
                                    <select id="ad_city" class="form-select">

                                    </select>
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="exampleFormControlInput1" class="form-label">Pin Code <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="zip_pin" required />
                                </div>

                                <div class="col-12 mt-3">
                                    <div class="form-check form-switch ">
                                        <input class="form-check-input bg-black" type="checkbox" role="switch" id="ad_default" checked>
                                        <label class="form-check-label" for="ad_default">Use my default
                                            address</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-dark" onclick="AddNewAddress();">Add New</button>
                    </div>
                </div>
            </div>
        </div>