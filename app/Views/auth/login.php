<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Login</h2>

        <!-- Display error message as red div -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('login') ?>">
            <?= csrf_field() ?>

            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input 
                    type="email" 
                    class="form-control <?= session()->getFlashdata('email_error') ? 'is-invalid' : '' ?>" 
                    id="email" 
                    name="email" 
                    value="<?= old('email') ?>" 
                    required>
                <!-- Error Message -->
                <?php if (session()->getFlashdata('email_error')): ?>
                    <div class="invalid-feedback">
                        <?= session()->getFlashdata('email_error') ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Password Field -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input 
                    type="password" 
                    class="form-control <?= session()->getFlashdata('password_error') ? 'is-invalid' : '' ?>" 
                    id="password" 
                    name="password" 
                    required>
                <!-- Error Message -->
                <?php if (session()->getFlashdata('password_error')): ?>
                    <div class="invalid-feedback">
                        <?= session()->getFlashdata('password_error') ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body>

</html>
