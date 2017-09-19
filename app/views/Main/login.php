<?php include 'app/views/_global/beforeContent.php'; ?>
 <main class="pa4 black-80 helvetica">
        <form class="measure center" method="post" onsubmit="return validateForm();">
            <fieldset id="sign_up" class="ba b--transparent ph0 mh0">
                <legend class="f4 fw6 ph0 mh0">Ulogujte se u administratorsku sekciju za poslodavce.</legend>
                <div class="mt3">
                    <label class="db fw6 lh-copy f6" for="email-address">Username</label>
                    <input id="username" class="pa2 input-reset ba bg-transparent w-100" type="text" type="text" name="username" required class="form-control"
                           pattern="^[A-z0-9_\-\.]{4,32}$" placeholder="Unesite korisničko ime">
                </div>
                <div class="mv3">
                    <label class="db fw6 lh-copy f6" for="password">Password</label>
                    <input id="password" class="b pa2 input-reset ba bg-transparent w-100" type="password" name="password" required class="form-control"
                           pattern="^.{6,255}$" placeholder="Unesite lozinku">
                </div>
            </fieldset>

            <div class="">
                <button name="loginBtn" type="submit" class="b ph3 no-underline pv2 input-reset bg-green white br2 ba b--none grow pointer f6 dib">
                        Prijavite se
                    </button>
            </div>
            </form>
    </main>
<script>
    function validateForm(){
    var user = document.getElementById('username');
    var pass = document.getElementById('password ');


    var form_ok = true;
    if (user.val().length < 6){
        form_ok = false;
        user.style.color = "red";
    } else {
        user.style.color = "black";
    }
    
    if (pass.val().length < 6){
        form_ok = false;
        pass.style.color = "red";
    } else {
        pass.style.color = "black";
    }
        
    return form_ok;    
    }
</script>

<?php if (isset($DATA['message'])): ?>
<p><?php echo htmlspecialchars($DATA['message']); ?></p>
<?php endif; ?>

<?php include 'app/views/_global/afterContent.php'; ?>