<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <div class="container">
                <h3>Login</h3>
                <hr>
                <?php if (session()->get('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
                <form action="<?php echo base_url(); ?>/users/login" method="post">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
                        <?php echo (isset($validation) && $validation->hasError('email')) ? '<div class="text-center"><label class="alert-danger alert p-0">'.$validation->getError('email').'</label></div>' : ''; ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" value="">
                        <?php echo (isset($validation) && $validation->hasError('password')) ? '<div class="text-center"><label class="alert-danger alert p-0">'.$validation->getError('password').'</label></div>' : ''; ?>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <button type="submit" class="btn btn-dark">Login</button>
                        </div>
                        <div class="col-12 col-sm-6 text-right">
                            <a class="btn btn-light" href="<?php echo base_url(); ?>/users/register">Don't have an account yet?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>