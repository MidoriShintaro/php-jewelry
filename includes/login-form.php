<section class="main-container col1-layout wow bounceInUp animated">
    <div class="main container">
        <div class="account-login">
            <div class="page-title">
                <h2>YOU NEED LOGIN OR REGISTER BEFORE ADD PRODUCT TO YOUR CART</h2>
            </div>
            <fieldset class="col2-set">
                <legend>Login or Create an Account</legend>
                <div class="col-1 new-users"><strong>New Customers</strong>
                    <form action="process.php" method="post" class="form-list">
                        <li>
                            <label>name <span class="required">*</span></label>
                            <br>
                            <input type="text" class="input-text" name="name_register" required>
                        </li>
                        <li>
                            <label>Email Address <span class="required">*</span></label>
                            <br>
                            <input type="email" class="input-text" name="email_register" required>
                        </li>
                        <li>
                            <label>Password <span class="required">*</span></label>
                            <br>
                            <input type="password" class="input-text" name="password_register" required>
                        </li>
                        <li>
                            <label>phone <span class="required">*</span></label>
                            <br>
                            <input type="text" class="input-text" name="phone_register" required>
                        </li>
                        <li>
                            <label>note <span class="required">*</span></label>
                            <br>
                            <input type="text" class="input-text" name="note_register" required>
                        </li>
                        <li>
                            <label>address <span class="required">*</span></label>
                            <br>
                            <input type="text" class="input-text" name="address_register" required>
                        </li>
                        <input type="hidden" name="giaohang_register" value="0">
                        <p class="required">* Required Fields</p>
                        <div class="buttons-set">
                            <button type="submit" name="register" class="button create-account"><span>Create an Account</span></button>
                        </div>
                    </form>
                </div>
                <div class="col-2 registered-users"><strong>Registered Customers</strong>
                    <div class="content">
                        <p>If you have an account with us, please log in.</p>
                        <form action="process.php" method="post" class="form-list">
                            <li>
                                <label for="email">Email Address <span class="required">*</span></label>
                                <br>
                                <input type="text" title="Email Address" class="input-text" id="email" name="email_login" required>
                            </li>
                            <li>
                                <label for="pass">Password <span class="required">*</span></label>
                                <br>
                                <input type="password" title="Password" id="pass" class="input-text" name="password_login" required>
                            </li>
                            <p class="required">* Required Fields</p>
                            <div class="buttons-set">
                                <button type="submit" name="login" class="button login"><span>Login</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </fieldset>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
</section>