<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
  <title> </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://unpkg.com/tachyons@4.8.0/css/tachyons.min.css"/>
  <body>
      <!-- site header -->
    <header class="bg-green white helvetica mt0 pv2 pv3-ns">
        <div class="mw8 center ph4 flex flex-wrap justify-between items-center">
            <h1 class="flex"><img src="https://icon.now.sh/business_center/ffffff/32" class="mr3" alt="logo">Nađi posao</h1>
            <nav class="f6 fw6 ttu tracked">
                <?php if (Session::exists('user_id')): ?>
                        <?php include 'app/views/_global/menu-session.php'; ?>
                    <?php else: ?>
                        <?php include 'app/views/_global/menu-no-session.php'; ?>
                    <?php endif; ?>                
            </nav>
        </div>
    </header>

