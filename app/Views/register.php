<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <div class="container">
                <h3>Registration</h3>
                <hr>
                <form action="<?php echo base_url(); ?>/users/register" method="post">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nickname">Nickname</label>
                                <input type="text" class="form-control" name="nickname" id="nickname"
                                       value="<?= set_value('nickname') ?>">
                                <?php echo (isset($validation) && $validation->hasError('nickname')) ? '<div class="text-center"><label class="alert-danger alert p-0">'.$validation->getError('nickname').'</label></div>' : ''; ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="text" class="form-control" name="email" id="email"
                                       value="<?= set_value('email') ?>">
                                <?php echo (isset($validation) && $validation->hasError('email')) ? '<div class="text-center"><label class="alert-danger alert p-0">'.$validation->getError('email').'</label></div>' : ''; ?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" value="">
                                <?php echo (isset($validation) && $validation->hasError('password')) ? '<div class="text-center"><label class="alert-danger alert p-0">'.$validation->getError('password').'</label></div>' : ''; ?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="password_confirm">Confirm password</label>
                                <input type="password" class="form-control" name="password_confirm"
                                       id="password_confirm" value="">
                                <?php echo (isset($validation) && $validation->hasError('password_confirm')) ? '<div class="text-center"><label class="alert-danger alert p-0">'.$validation->getError('password_confirm').'</label></div>' : ''; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <button type="submit" class="btn btn-dark">Register</button>
                        </div>
                        <div class="col-12 col-sm-6 text-right">
                            <a class="btn btn-light" href="<?php echo base_url(); ?>/users/login">Already got existing account?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>