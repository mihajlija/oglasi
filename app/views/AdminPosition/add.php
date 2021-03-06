<?php include 'app/views/_global/beforeContent.php'; ?>

 <main class="black-80 helvetica mw7 center pa3 pa5-ns pt4 mw7 center">

        <div class="pb3">
            <div class="w-100 mt1">
                <h1 class="f2 f1-ns mv0">Dodaj oglas</h1>
            </div>
        </div>

        
        <section>
            <form class="measure" method="post">
                <fieldset id="sign_up" class="ba b--transparent ph0 mh0">
                <h3 class="f4 mt5 pb2 bb b--black-80 bw2">Javni podaci</h3>
                <small class="mb2 db">Ovi podaci ce biti dostupni svim posetiocima sajta.</small>
                <div class="mt3">
                    <label for="title" class="f6 b db mb2">Naslov</label>
                    <input name="title" id="title" class="input-reset ba b--black-20 pa2 mb2 db w-100" type="text" aria-describedby="naslov" required>
                </div>
                <div class="mt3">
                    <label for="slug" class="f6 b db mb2">Slug</label>
                    <input name="slug" id="slug" class="input-reset ba b--black-20 pa2 mb2 db w-100" type="text" aria-describedby="slug"  pattern='[a-z0-9\-]+' required>
                </div>
                <div class="mt3">
                    <label for="description" class="f6 b db mb2">Kratak opis radnog mesta</label>
                    <textarea name="description" id="description" class="w-100 tl pa2 ba b--black-20 mb2 db" aria-describedby="description" required>

                    </textarea>
                </div>
                <div class="mt3">
                    <label for="requirements" class="f6 b db mb2">Potrebna znanja i vestine</label>
                    <textarea name="requirements" id="requirements" class="w-100 tl pa2 ba b--black-20 mb2 db" aria-describedby="requirements" required>
                    </textarea> 
                </div>
                <div class="mt3">
                    <label for="responsibilities" class="f6 b db mb2">Radni zadaci</label>
                    <textarea name="responsibilities" id="responsibilities" class="w-100 tl pa2 ba b--black-20 mb2 db" aria-describedby="responsibilities" required>
                    </textarea> 
                </div>
                <div class="mt3">
                    <label for="location_id" class="f6 b db mb2">Lokacija</label>
                    <select name="location_id" id="location_id" class="w-100 tl pa2 ba b--black-20 mb2 db" aria-describedby="location" required>
                        <?php foreach ($DATA['locations'] as $item): ?>
                        <option value='<?php echo $item->location_id; ?>'><?php echo htmlspecialchars($item->name); ?></option>    
                        <?php endforeach; ?>
                    </select> 
                </div>
                
                <label>Kljucne reci</label></br>
                <?php foreach ($DATA['keywords'] as $keyword): ?>
                <input type='checkbox' name='keyword_ids[]' value='<?php echo $keyword->keyword_id; ?>'> <?php echo htmlspecialchars($keyword->name); ?><br>
                <?php endforeach; ?>
                
                <div class="mt5">
                    <input class="b ph3 pv3 input-reset bg-green white no-underline br2 ba b--none animate grow pointer f4 tc db w-100" type="submit" value="Objavi oglas">
                </div>
            </form>
        </section>
                   
            <?php if ($DATA['message']): ?>
            <p>
                <?php echo htmlspecialchars($DATA['message']); ?>
            </p>
            <?php endif; ?>
    </main> 


<?php include 'app/views/_global/afterContent.php'; ?>