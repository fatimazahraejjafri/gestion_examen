<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">


</head>
<body>
<div class="container mt-5">
<h2 class="text-center">Inscription</h2>
       
        <!-- Formulaire d'inscription -->
        <form action="<?= base_url('auth') ?>" method="POST">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" required value="<?= old('email') ?>" />
                
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
               
            </div>

           

           

            <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
        </form>

        <p class="mt-3">
            Vous avez déjà un compte ? <a href="<?= base_url('login') ?>">Connectez-vous</a>
        </p>
    </div>
</body>
</html>
