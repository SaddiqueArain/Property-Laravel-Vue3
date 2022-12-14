<?php include 'header.php' ?>
<div class="container py-2">
    <div class="card shadow-sm login-card w-100 text-left mt-5">
        <div class="card-header bg-white border-bottom-0 mt-4">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="font-weight-normal text-7 mb-0">
                    <strong class="font-weight-extra-bold">User</strong>
                    <strong class="font-weight-extra-bold">Profile</strong>

                </h2>
            </div>
            <div class="overflow-hidden pt-3">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 mt-4 mt-lg-0">
                    <div class="d-flex justify-content-center mb-4">
                        <div class="profile-image-outer-container">
                            <div class="profile-image-inner-container bg-color-primary">
                                <img src="user-profile.png" class="rounded-circle" height="210" width="210">
                                <span class="profile-image-button bg-color-dark">
                                    <i class="fas fa-camera text-light"></i>
                                </span>
                            </div>
                            <input type="file" id="file" class="form-control profile-image-input">
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <form id="user-profile" action="" method="">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label line-height-9 pt-2 letter-spacing text-secondary text-2 font-weight-bold required">First name</label>
                            <div class="col-lg-9">
                                <input class="form-control text-3 h-auto py-2" type="text" name="firstName" value="Abc" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label line-height-9 pt-2 letter-spacing text-secondary text-2 font-weight-bold required">Last name</label>
                            <div class="col-lg-9">
                                <input class="form-control text-3 h-auto py-2" type="text" name="lastName" value="Xyz" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label line-height-9 pt-2 letter-spacing text-secondary text-2 font-weight-bold required">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control text-3 h-auto py-2" type="email" name="email" value="example@gmail.com" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label line-height-9 pt-2 letter-spacing text-secondary text-2 font-weight-bold">Company</label>
                            <div class="col-lg-9">
                                <input class="form-control text-3 h-auto py-2" type="text" name="company" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label line-height-9 pt-2 letter-spacing text-secondary text-2 font-weight-bold">Website</label>
                            <div class="col-lg-9">
                                <input class="form-control text-3 h-auto py-2" type="url" name="website" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label line-height-9 pt-2 letter-spacing text-secondary text-2 font-weight-bold">Address</label>
                            <div class="col-lg-9">
                                <input class="form-control text-3 h-auto py-2" type="text" name="address" value="" placeholder="Street">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 font-weight-bold"></label>
                            <div class="col-lg-6">
                                <input class="form-control text-3 h-auto py-2" type="text" name="city" value="" placeholder="City">
                            </div>
                            <div class="col-lg-3">
                                <input class="form-control text-3 h-auto py-2" type="text" name="state" value="" placeholder="State">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label line-height-9 pt-2 letter-spacing text-secondary font-weight-bold text-2">Time Zone</label>
                            <div class="col-lg-9">
                                <div class="">
                                    <select id="user_time_zone" class="form-control text-3 h-auto py-2" name="timeZone" size="0">
                                        <option value="Hawaii">(GMT-10:00) Hawaii</option>
                                        <option value="Alaska">(GMT-09:00) Alaska</option>
                                        <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                        <option value="Arizona">(GMT-07:00) Arizona</option>
                                        <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                        <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
                                        <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                        <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label line-height-9 pt-2 letter-spacing font-weight-bold text-secondary text-2 required">Username</label>
                            <div class="col-lg-9">
                                <input class="form-control text-3 h-auto py-2" type="text" name="username" value="" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label line-height-9 pt-2 letter-spacing font-weight-bold text-secondary text-2 required">Password</label>
                            <div class="col-lg-9">
                                <input class="form-control text-3 h-auto py-2" type="password" name="password" value="" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label line-height-9 pt-2 letter-spacing font-weight-bold text-secondary text-2 required">Confirm password</label>
                            <div class="col-lg-9">
                                <input class="form-control text-3 h-auto py-2" type="password" name="confirmPassword" value="" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-lg-9">

                            </div>
                            <div class="form-group col-lg-3">
                                <button type="submit" class="btn test-fancy border-0 text-white btn-color w-100 text-uppercase">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>