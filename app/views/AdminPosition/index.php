<?php include 'app/views/_global/beforeContent.php'; ?>

 <main class="black-80 helvetica mw7 center pt4">

        <div class="pa2 ph3-ns pb3-ns">
            <div class="w-100 mt1">
                <h1 class="f4 f1-ns mv0">Lista oglasa</h1>
            </div>
        </div>
     
<div class="pa2 pa3-ns">
            <div class="overflow-auto">
                <table class="f6 w-100 mw8 center" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="fw6 bb b--black-20 tl pb3 pr3 bg-white">Ime</th>
                            <th class="fw6 bb b--black-20 tl pb3 pr3 bg-white">Lokacija</th>
                            <th class="fw6 bb b--black-20 tl pb3 pr3 bg-white">Opis</th>
                            <th class="fw6 bb b--black-20 tl pb3 pr3 bg-white">Opcije</th>
                        </tr>
                    </thead>
                    <tbody class="lh-copy">
                        <?php foreach ($DATA['positions'] as $position): ?>
                        <tr class="hover-bg-near-white">
                        <td class="pv3 pr3 bb b--black-20"><?php echo htmlspecialchars($position->title); ?></td>
                        <td class="pv3 pr3 bb b--black-20"><?php echo htmlspecialchars($position->location->name); ?></td>
                        <td class="pv3 pr3 bb b--black-20"><?php echo htmlspecialchars($position->description); ?></td>
                        <td class="pv3 pr3 bb b--black-20"><?php Misc::url('admin/positions/edit/'. $position->position_id, 'Edit'); ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
 </main>

<?php include 'app/views/_global/afterContent.php'; ?>