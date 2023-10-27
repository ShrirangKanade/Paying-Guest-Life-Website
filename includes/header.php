
<!-- Stickey-Top -->

<div class="header sticky-top">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="signup.php">
                    <img src="img/logo.png" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#my-navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <div class="collapse navbar-collapse justify-content-end" id="my-navbar">
                    <ul class="navbar-nav">
                    <?php //Check if user is logged-in or not
                        if (!isset($_SESSION["user_id"])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#signup-modal">
                                <i class="fas fa-user"></i>Signup
                            </a>
                        </li>
                        <div class="nav-vl"></div>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#login-modal">
                                <i class="fas fa-sign-in-alt"></i>Login
                            </a>
                        </li>
                        
                        <?php
                             } else {
                         ?>
                        <div class='nav-name'>
                            Hi, <?php echo $_SESSION["name"] ?>
                        </div>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">
                                <i class="fas fa-user"></i>Dashboard
                            </a>
                        </li>
                        <div class="nav-vl"></div>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">
                                <i class="fas fa-sign-out-alt"></i>Logout
                            </a>
                        </li>
                       <?php
                        }      
                        ?>
                    </ul>
                </div>
            </nav>
        </div>
  
        <!-- Signup Modal -->
        <div class="modal fade" id="signup-modal" tabindex="-1" aria-labelledby="SignupModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="SignupModal">Signup with PGLife</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="signup-form" class="form" role="form" method="post" autocomplete="off" action="api/signup_submit.php">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="full_name" placeholder="Full Name" maxlength="30" required>
                            </div>
                            <br>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-phone-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="phone" placeholder="Phone Number" maxlength="10" minlength="10" required>
                            </div>
                            <br>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <br>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control" name="password" placeholder="Password" minlength="6" required>
                            </div>
                            <br>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-university"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="college_name" placeholder="College Name" maxlength="150" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <span>I'm a</span>
                                <input type="radio" class="ml-3" id="gender-male" name="gender" value="male" /> Male
                                <label for="gender-male">
                                </label>
                                <input type="radio" class="ml-3" id="gender-female" name="gender" value="female" />
                                <label for="gender-female">
                                    Female
                                </label>
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" id="CreAc" class="btn btn-block btn-primary">Create Account</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <span>Already have an account?
                            <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#login-modal">Login</a>
                        </span>
                    </div>
                 </div>
            </div>
        </div>
        
        <!-- Login Modal -->
        <div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="LoginModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="LoginModal">Login with PGlife</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                    <form id="login-form" class="form" role="form" method="post" autocomplete="off" action="api/login_submit.php">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <br>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control" name="password" placeholder="Password" minlength="6" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" id="Log" class="btn btn-block btn-primary">Login</button>
                        </div>
                    </form>
                </div>
                  
                
                <div class="modal-footer">
                    <span>
                        <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#signup-modal">Click here</a>
                        to register a new account
                    </span>
                </div>
              </div>
            </div>
        </div>

       
