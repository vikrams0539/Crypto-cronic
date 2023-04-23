<section class="membershipWrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="typography mb-5 pb-4">
                    <h2>Pilot Registration</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Eu, mi aliquam tortor purus odio amet a habitasse. Nisl egestas amet malesuada sem faucibus malesuada tortor, dui. Et porttitor sem sollicitudin feugiat velit dolor aliquet ac potenti. Tempus diam lobortis vitae vestibulum tellus integer ornare egestas purus.</p>
                </div>
            </div>
            <div class="col-12">
                <div class="forms mb-5 pb-4">
                    <form class="row g-3" method="post" id="pilotForm">
                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputName" class="form-label">Name</label>
                            
                            <input type="text" class="form-control" id="inputName" autocomplete="off" name="inputName" />
                            <div class='errorMessage'></div>
                        </div>
                        
                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputAddress" class="form-label">Address</label>
                            
                            <textarea rows="3" class="form-control" id="inputAddress" autocomplete="off" name="inputAddress" > </textarea>
                            <div class='errorMessage'></div>
                        </div>

                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputDOB" class="form-label">DOB</label>
                            
                            <input type="text" class="form-control" id="inputDOB" autocomplete="off" name="inputDOB" />
                            <div class='errorMessage'></div>
                        </div>
                        
                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputRefNo" class="form-label">CAA Reference No</label>
                            
                            <input type="text" class="form-control" id="inputRefNo" autocomplete="off" name="inputRefNo" />
                            <div class='errorMessage'></div>
                        </div>
                        
                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputSEP" class="form-label">SEP Expiry</label>
                            
                            <input type="text" class="form-control" id="inputSEP" autocomplete="off" name="inputSEP" />
                            <div class='errorMessage'></div>
                        </div>
                        
                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputMEP" class="form-label">MEP Expiry</label>
                            
                            <input type="text" class="form-control" id="inputMEP" autocomplete="off" name="inputMEP" />
                            <div class='errorMessage'></div>
                        </div>
                        
                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputMedicalClass1" class="form-label">Medical Class 1 Expiry</label>
                            
                            <input type="text" class="form-control" id="inputMedicalClass1" autocomplete="off" name="inputMedicalClass1" />
                            <div class='errorMessage'></div>
                        </div>
                        
                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputMedicalClass2" class="form-label">Medical Class 2 Expiry</label>
                            
                            <input type="text" class="form-control" id="inputMedicalClass2" autocomplete="off" name="inputMedicalClass2" />
                            <div class='errorMessage'></div>
                        </div>
                        
                        <div class="col-12 col-lg-6 position-relative">
                            <label for="inputMedicalLAPL" class="form-label">Medical LAPL Expiry</label>
                            
                            <input type="text" class="form-control" id="inputMedicalLAPL" autocomplete="off" name="inputMedicalLAPL" />
                            <div class='errorMessage'></div>
                        </div>
                        
                        <div class="col-12">
                            <input type="submit" id="pilotSubmit" class="submitBtn" disabled="disabled" />
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