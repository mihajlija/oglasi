<?php include 'app/views/_global/beforeContent.php'; ?>

<main class="black-80 helvetica">
    <article class="pa3 pa5-ns mw7 center">       
        <h1 class="f2 f1-l mt2"><?php echo htmlspecialchars($DATA['position']->title); ?></h1>  
        <section>
            <h2 class="black-80">O poziciji</h2>
            <p class="measure-wide lh-copy"><?php echo $DATA['position']->description; ?></p>
        </section>
        <section>
            <h2 class="black-80">Potrebna znanja</h2>
            <p class="measure-wide lh-copy"><?php echo $DATA['position']->requirements; ?></p>
        </section>
        <section>
            <h2 class="black-80">Zaduženja</h2>
            <p class="measure-wide lh-copy"><?php echo $DATA['position']->responsibilities; ?></p> 
        </section>
        <footer class="mt4">
            <a href="mailto:mihajlija@gmail.com?Subject=<?php echo htmlspecialchars($DATA['position']->title); ?>" target="_top" class="b ph3 pv3 bg-green white no-underline br2 ba b--none pointer f4 tc db">Prijavi se</a>
            <p class="lh-copy mb4 tc">Rok za prijave je <strong>12.9.2017.</strong></p>
        </footer>
    </article>
</main>

<?php include 'app/views/_global/afterContent.php'; ?>
