<?php include 'app/views/_global/beforeContent.php'; ?>

<article class="row">
    <div class="col-xs-12">
        <div class="page-content">
            <h2>Dodavanje kljucne reci</h2>
            <form method="post">
                <label for="name">Kljucna rec</label>
                <input type="text" name='name' id='name' required></input></br>
                
                <label for="slug">Slug</label>
                <input type="text" name='slug' id='slug' required pattern='[a-z0-9\-]+'></input></br>
                
                <button type='submit'>Dodaj kljucnu rec</button>
            </form> 
            
            <?php if ($DATA['message']): ?>
            <p>
                <?php echo htmlspecialchars($DATA['message']); ?>
            </p>
            <?php endif; ?>
        </div>
    </div>
</article>

<?php include 'app/views/_global/afterContent.php'; ?>