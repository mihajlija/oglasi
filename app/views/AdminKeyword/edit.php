<?php include 'app/views/_global/beforeContent.php'; ?>

<main class="black-80 helvetica mw7 center pa3 pa5-ns pt4 mw7 center">

    <div class="pb3">
        <div class="w-100 mt1">
                <h1 class="f2 f1-ns mv0">Izmena kljucne reci</h1>
        </div>
    </div>
    <form class="measure" method="post">
                <fieldset id="sign_up" class="ba b--transparent ph0 mh0">
                <div class="mt3">
                    <label for="name" class="f6 b db mb2">Kljucna rec</label>
                    <input class="input-reset ba b--black-20 pa2 mb2 db w-100" type="text" aria-describedby="naslov" type="text" name='name' id='name' required
                    value='<?php echo htmlspecialchars($DATA['keyword']->name); ?>'></input>
                </div>
                <div class="mt3">
                    <label  for="slug" class="f6 b db mb2">Slug</label>
                    <input class="input-reset ba b--black-20 pa2 mb2 db w-100" aria-describedby="slug" type="text" name='slug' id='slug' required pattern='[a-z0-9\-]+'
                    value='<?php echo htmlspecialchars($DATA['keyword']->slug); ?>'></input>
                </div>
                </fieldset>
                <button type='submit' class="b ph3 no-underline pv2 input-reset bg-green white br2 ba b--none grow pointer f6 dib">Izmeni kljucnu rec</button>
    </form>
</main>

<?php include 'app/views/_global/afterContent.php'; ?>