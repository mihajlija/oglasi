<?php include 'app/views/_global/beforeContent.php'; ?>

<article class="row">
    <div class="col-xs-12">
        <div class="page-content">
            <h2>Lista oglasa</h2>
            <table>
                <thead>
                    <tr>

                    </tr>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Description</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($DATA['positions'] as $position): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($position->title); ?></td>
                        <td><?php echo htmlspecialchars($position->location->name); ?></td>
                        <td><?php echo htmlspecialchars($position->description); ?></td>
                        <td><?php Misc::url('admin/positions/edit/'. $position->position_id, 'Edit'); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</article>

<?php include 'app/views/_global/afterContent.php'; ?>