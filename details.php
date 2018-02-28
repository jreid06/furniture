<?php
    include dirname(__DIR__).'/furniture/scripts/dbconnect.php';
    include ROOT_PATH.'templates/header.php';
    include ROOT_PATH.'templates/nav.php';
 ?>

 <div class="container-fluid home details-add-home">
     <div class="row">
         <div class="col-12">
             <br>
             <h4 class="text-center">Add Your Details for delivery</h4>
             <br>
             <p class="text-muted">NOTE: If you create an account all the details will be filled in automatically at checkout </p>
             <br>
         </div>

         <!-- PERSONAL DETAILS -->
         <div class="col-12 col-lg-6 personal-details-guest">
             <div class="disabled-layer disabled-details">

             </div>
             <div class="col-12 col-md-7 guest-form form-details-column">

                 <form id="checkout-form-guest-pdetails">
                     <div class="form-row">
                         <div class="col-12">
                             <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Title</label>
                                  </div>
                                  <select class="inputTitle" name="user-title" id="inputGroupSelect01" required>
                                      <option value="default">Please select option</option>
                                      <option value="Mr.">Mr.</option>
                                      <option value="Miss.">Miss.</option>
                                      <option value="Mrs.">Mrs.</option>
                                      <option value="Ms.">Ms.</option>
                                  </select>
                            </div>
                             <br>
                         </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationfname">First name</label>
                           <input type="text" class="form-control" id="validationfname" placeholder="First name" value="" required>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationlname">Last name</label>
                           <input type="text" class="form-control" id="validationlname" placeholder="Last name" value="" required>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationDefaultEmail">Email</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="inputGroupPrepend2">@</span>
                              </div>
                              <input type="email" class="form-control" id="validationDefaultEmail" placeholder="Email" aria-describedby="inputGroupPrepend2" required>
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="userAge">D.O.B</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                   <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                </div>
                                <input type="date" class="form-control" id="userAge" value="" required>
                            </div>
                            <p class="text-danger age-error"></p>
                        </div>
                        <div class="col-12">
                            <!-- will send a request to script to save details in session variable -->
                            <button class="btn btn-primary save-p-details" type="submit" @click.prevent="saveCustomerDetails" data-save-type="personal">SAVE</button>
                            <p class="text-danger personal-details-error"></p>
                        </div>

                     </div>
                 </form>
             </div>
         </div>

         <!-- SHIPPING DETAILS -->
         <!--
            - disabled until personal details have been saved
            - disabled feature is a layer over the column to stop interaction
        -->
         <div class="col-12 col-lg-6 shipping-details-guest">
             <div class="disabled-layer disabled-shipping">

             </div>
             <form id="checkout-form-guest-shipdetails">
                 <div class="form-row">
                     <div class="col-md-6 mb-3">
                        <label for="validationAddress1">Address 1 *</label>
                        <input type="text" class="form-control" id="validationAddress1" placeholder="Address line 1" required>
                     </div>
                     <div class="col-md-6 mb-3">
                        <label for="validationAddress2">Address 2 *</label>
                        <input type="text" class="form-control" id="validationAddress2" placeholder="Address line 2">
                     </div>
                    <div class="col-md-6 mb-3">
                       <label for="validationCity">City *</label>
                       <input type="text" class="form-control" id="validationCity" placeholder="City" required>
                    </div>
                    <div class="col-md-3 mb-3">
                       <label for="validationPostcode">Post Code / Zip *</label>
                       <input type="text" class="form-control" id="validationPostcode" placeholder="Post / Zip code" required>
                    </div>
                    <div class="col-md-3 mb-3">
                       <label for="validationCountry">Country *</label>
                       <select class="validationCountry" name="user-title" required>
                           <option value="United Kingdom" selected>United Kingdom</option>
                       </select>
                    </div>
                    <div class="col-md-6 mb-3">
                       <label for="validationNumber">Phone no. * (e.g 07983 100 100)</label>
                       <div class="input-group">
                          <div class="input-group-prepend">
                             <span class="input-group-text" id="inputGroupPrepend2">@</span>
                          </div>
                          <input type="text" class="form-control" id="validationNumber" placeholder="Phone Number" aria-describedby="inputGroupPrepend2" required>
                       </div>
                    </div>
                    <div class="col-12">
                        <!-- will send a request to script to save details in session variable -->
                        <button class="btn btn-primary save-ship-details" type="submit" data-save-type="shipping" @click.prevent="saveShippingDetails">SAVE</button>
                    </div>
                 </div>
             </form>
         </div>
     </div>
 </div>


 <?php
     include ROOT_PATH.'templates/footer.php';
  ?>
