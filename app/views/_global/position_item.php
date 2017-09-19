<div class="position-item">
    <a href="<?php echo Configuration::BASE_PATH?>position/<?php echo $position->slug?>">
    <h2><?php echo htmlspecialchars($position->title)?></h2></a>
    <p><?php echo htmlspecialchars($position->location->name); ?></p>
    <p><?php echo htmlspecialchars($position->description)?></p>
    <div>

    </div>
</div>
