<section class="membershipWrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="typography mb-5 pb-4">
                    <h2>Membership Registration</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Eu, mi aliquam tortor purus odio amet a habitasse. Nisl egestas amet malesuada sem faucibus malesuada tortor, dui. Et porttitor sem sollicitudin feugiat velit dolor aliquet ac potenti. Tempus diam lobortis vitae vestibulum tellus integer ornare egestas purus.</p>
                </div>
            </div>
            <div class="col-12">
                <div class="forms mb-5 pb-4">
                    <form class="row g-3" method="post" id="memberForm">
                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputMemberFirstName" class="form-label">first Name</label>
                            <input type="text" class="form-control" id="inputMemberFirstName" autocomplete="off" name="inputMemberFirstName" />
                            <div class='errorMessage'></div>
                        </div>
                        
                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputMemberLastName" class="form-label">last Name</label>
                            <input type="text" class="form-control" id="inputMemberLastName" autocomplete="off" name="inputMemberLastName" />
                            <div class='errorMessage'></div>
                        </div>
                        
                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputMemberAddress" class="form-label">Address</label>
                            <textarea rows="3" class="form-control" id="inputMemberAddress" autocomplete="off" name="inputMemberAddress" > </textarea>
                            <div class='errorMessage'></div>
                        </div>

                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputMemberPassNo" class="form-label">passport No.</label>
                            <input type="text" class="form-control" id="inputMemberPassNo" autocomplete="off" name="inputMemberPassNo" />
                            <div class='errorMessage'></div>
                        </div>                        
                        
                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputMemberLicenseNo" class="form-label">license No.</label>
                            <input type="text" class="form-control" id="inputMemberLicenseNo" autocomplete="off" name="inputMemberLicenseNo" />
                            <div class='errorMessage'></div>
                        </div> 

                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputMemberDOB" class="form-label">DOB</label>
                            <input type="text" class="form-control" id="inputMemberDOB" autocomplete="off" name="inputMemberDOB" />
                            <div class='errorMessage'></div>
                        </div>
                        
                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputMemberContact" class="form-label">contact No.</label>
                            <input type="text" class="form-control" id="inputMemberContact" autocomplete="off" name="inputMemberContact" />
                            <div class='errorMessage'></div>
                        </div>

                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputMemberEmail" class="form-label">Email</label>
                            <input type="text" class="form-control" id="inputMemberEmail" autocomplete="off" name="inputMemberEmail" />
                            <div class='errorMessage'></div>
                        </div>

                        <div class="col-12">
                            <input type="submit" id="membershipSubmit" class="submitBtn" disabled="disabled" />
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