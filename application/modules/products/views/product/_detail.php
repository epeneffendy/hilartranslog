<table class="table table-hover">
    <thead>
    <tr>
        <th>No</th>
        <th>Store</th>
        <th>URL</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($temp)): ?>
        <?php
        $no = 1;
        foreach ($temp as $item): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $item['store_name'] ?></td>
                <td><?= ucwords($item['store']) ?></td>
                <td><?= $item['url'] ?></td>
                <td>
                    <button class="btn btn-xs btn-danger btn-delete" type="button" data-key="<?= $item['id'] ?>">
                        <span class="fa fa-trash"></span></button>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="8" style="text-align: center; font-style: italic">Data Not Found!</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>

<script>

    $("body").off("click", ".btn-edit").on("click", ".btn-edit", function (e) {
        console.log("Asd");
        var action = $(this).attr("data-action");
        var key = $(this).attr("data-key");
        load_modal(action, key);
    });

    $("body").off("click", ".btn-delete").on("click", ".btn-delete", function (e) {
        var key = $(this).attr("data-key");
        if (confirm("Delete this data ?")) {
            $.ajax({
                url: baseUrl + '/products/products/delete_detail_temp',
                type: "POST",
                data: {
                    'key': key
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    if (data.success == true) {
                        load_detail();
                    }
                },
            });
        }
    });

</script>
