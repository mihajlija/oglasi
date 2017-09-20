<?php include 'app/views/_global/beforeContent.php'; ?>

<article class="row">
    <div class="col-xs-12">
        <div class="page-content">
            <h2>Lista kljucnih reci</h2>
            <table>
                <thead>
                    <tr>
                        <td colspan="4">
                            <?php $Misc::url('admin/keywords/add', 'Add new keyword'); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($DATA['keywords'] as $keyword): ?>
                    <tr>
                        <td><?php echo $keyword->keyword_id; ?></td>
                        <td><?php echo htmlspecialchars($keyword->name); ?></td>
                        <td><?php echo htmlspecialchars($keyword->slug); ?></td>
                        <td><?php $Misc::url('admin/keywords/edit/' . $keyword->keyword_id, 'Edit'); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</article>

<?php include 'app/views/_global/afterContent.php'; ?>
