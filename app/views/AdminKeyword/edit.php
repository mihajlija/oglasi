<?php include 'app/views/_global/beforeContent.php'; ?>

<article class="row">
    <div class="col-xs-12">
        <div class="page-content">
            <h2>Izmena kljucne reci</h2>
            <form method="post">
                <label for="name">Kljucna rec</label>
                <input type="text" name='name' id='name' required value='<?php echo htmlspecialchars($DATA['keyword']->name); ?>'></input></br>
                
                <label for="slug">Slug</label>
                <input type="text" name='slug' id='slug' required pattern='[a-z0-9\-]+' value='<?php echo htmlspecialchars($DATA['keyword']->slug); ?>'></input></br>
                
                <button type='submit'>Izmeni</button>
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