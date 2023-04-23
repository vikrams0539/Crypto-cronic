<section class="planeWrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="typography mb-5 pb-4">
                    <h2>PPR Form</h2>
                    <p class='w-50'>Prior notification of your arrival is required at Prestwick Flight Centre,</p>
                </div>
            </div>
            <div class="col-12">
                <div class="forms mb-5 pb-4">
                    <form class="row g-3" method="post" id="planeForm">
                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputPlaneFirstName" class="form-label">first Name</label>
                            <input type="text" class="form-control" id="inputPlaneFirstName" autocomplete="off" name="inputPlaneFirstName" />
                            <div class='errorMessage'></div>
                        </div>
                        
                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputPlaneAddress" class="form-label">Address</label>
                            <textarea rows="3" class="form-control" id="inputPlaneAddress" autocomplete="off" name="inputPlaneAddress" > </textarea>
                            <div class='errorMessage'></div>
                        </div>

                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputPlaneDOB" class="form-label">DOB</label>
                            <input type="text" class="form-control" id="inputPlaneDOB" autocomplete="off" name="inputPlaneDOB" />
                            <div class='errorMessage'></div>
                        </div>

                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputPlaneLicenseNo" class="form-label">type of licence</label>
                            <input type="text" class="form-control" id="inputPlaneLicenseNo" autocomplete="off" name="inputPlaneLicenseNo" />
                            <div class='errorMessage'></div>
                        </div> 
                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputPlaneMedical" class="form-label">medical date expiry</label>
                            <input type="text" class="form-control" id="inputPlaneMedical" autocomplete="off" name="inputPlaneMedical" />
                            <div class='errorMessage'></div>
                        </div>

                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputPlaneSEP" class="form-label">SEP Expiry</label>
                            <input type="text" class="form-control" id="inputPlaneSEP" autocomplete="off" name="inputPlaneSEP" />
                            <div class='errorMessage'></div>
                        </div>

                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputPlaneMEP" class="form-label">MEP Expiry</label>
                            <input type="text" class="form-control" id="inputPlaneMEP" autocomplete="off" name="inputPlaneMEP" />
                            <div class='errorMessage'></div>
                        </div>

                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputPlaneIR" class="form-label">IR Expiry</label>
                            <input type="text" class="form-control" id="inputPlaneIR" autocomplete="off" name="inputPlaneIR" />
                            <div class='errorMessage'></div>
                        </div>

                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputPlaneUpload" class="form-label">Upload Attachement</label>
                            <input type="file" class="form-control" id="inputPlaneUpload" autocomplete="off" name="inputPlaneUpload" />
                            <div class='errorMessage'></div>
                        </div>

                        <div class="col-12">
                            <input type="submit" id="planeSubmit" class="submitBtn" disabled="disabled" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="loadingScreen">
    <div class="response">
        
    </div>
    <div class="spinner-border" id="spinner" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>