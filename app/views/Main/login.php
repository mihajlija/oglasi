<?php include 'app/views/_global/beforeContent.php'; ?>

<article class="row">
    <div class="col-xs-12">
        <h1>Prijava na portal</h1>
        <div class="page-content">
            <form method="post">
                <div class="form-group">
                    <label for="username">Korisničko ime:</label><br>
                    <input type="text" name="username" required class="form-control"
                           pattern="^[A-z0-9_\-\.]{4,32}$" placeholder="Unesite korisničko ime">
                </div>

                <div class="form-group">
                    <label for="password">Lozinka:</label><br>
                    <input type="password" name="password" required class="form-control"
                           pattern="^.{6,255}$" placeholder="Unesite lozinku">
                </div>

                <div class="form-group">
                    <button name="loginBtn" type="submit" class="btn btn-primary">
                        Prijavite se
                    </button>
                </div>
            </form>
        </div>
    </div>
</article>

<?php if (isset($DATA['message'])): ?>
<p><?php echo htmlspecialchars($DATA['message']); ?></p>
<?php endif; ?>

<?php include 'app/views/_global/afterContent.php'; ?>