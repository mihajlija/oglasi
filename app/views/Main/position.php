<?php include 'app/views/_global/beforeContent.php'; ?>

<article class="">
    <header>
        <h1><?php echo htmlspecialchars($DATA['position']->title); ?></h1>
    </header>   
    <div>
        <p><?php echo $DATA['position']->description; ?></p>
        <p><?php echo $DATA['position']->requirements; ?></p>
        <p><?php echo $DATA['position']->responsibilities; ?></p>       
    </div>
    <a href="mailto:mihajlija@gmail.com?Subject=<?php echo htmlspecialchars($DATA['position']->title); ?>" target="_top">Prijavi se</a>
</article>

<?php include 'app/views/_global/afterContent.php'; ?>