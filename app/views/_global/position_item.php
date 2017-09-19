<article class="br2 ba dark-gray b--black-10 bg-white ma2">
    
    <a class="db pv4 ph0-l no-underline black dim" href="<?php echo Configuration::BASE_PATH?>position/<?php echo $position->slug?>">
                    <div class="pa2 ph3-ns pb3-ns">
                        <div class="w-100 mt1">
                            <h1 class="f5 f4-ns mv0"><?php echo htmlspecialchars($position->title)?></h1>
                            <p class="f5 mt2 mb0"><img src="https://icon.now.sh/pin/16" class="mr1" alt="icon pin"><?php echo htmlspecialchars($position->location->name); ?></p>
                        </div>
                        <p class="f6 lh-copy measure mt2 mid-gray">
                            <?php echo htmlspecialchars($position->description)?>
                        </p>
                        <p class="f7 ttu tracked mt2 mb0 black-60">Rok za prijave: <strong>12/9</strong></p>
                    </div>
                </a>

</article>
