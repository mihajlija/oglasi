<?php include 'app/views/_global/beforeContent.php'; ?>

<article class="">
    <header>
        <h1><?php echo $DATA['positions'][0]->location->name?></h1>
    </header>
    <div>
        <nav>
        <?php foreach ($DATA['locations'] as $location): ?>
            <?php Misc::url('location/'.$location->slug, $location->name)?>
        <?php endforeach; ?>    
        </nav>
    </div>
    
    <div>
        <?php foreach ($DATA['positions'] as $position): ?>
        <?php require 'app/views/_global/position_item.php'; ?>
        <?php endforeach;?>
    </div>
</article>

<?php include 'app/views/_global/afterContent.php'; ?>