<?php include 'app/views/_global/beforeContent.php'; ?>

<article class="">
        <div class="helvetica mt0 pv2 pv3-ns">
        <div class="mw8 center ph4 flex flex-wrap justify-between items-center">
            <h1 class="flex">Oglasi</h1>
            <nav class="f6 fw6 ttu tracked link white dib mr3 pv2 f7 f6-ns">
                <?php foreach ($DATA['locations'] as $location): ?>
                <?php Misc::url('location/'.$location->slug, $location->name)?>
                <?php endforeach; ?> 
            </nav>
        </div>
    </div>
 
        <main class="black-80 helvetica mw8 center pt4">
            <section class="flex flex-wrap">

        <?php foreach ($DATA['positions'] as $position): ?>
        <?php require 'app/views/_global/position_item.php'; ?>
        <?php endforeach;?>
            </section>
    </main>
</article>

<?php include 'app/views/_global/afterContent.php'; ?>