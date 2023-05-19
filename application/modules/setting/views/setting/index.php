<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3 class="card-title">Galery</h3>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('failed')) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('failed'); ?>
            </div>
        <?php endif; ?>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Setting</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($data)) : ?>
                <?php foreach ($data as $item) : ?>
                    <tr>
                        <td><?= $item->menu ?></td>
                        <td>
                            <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['setting-section[U]']))) : ?>
                                <button class="btn btn-primary btn-xs pull-right btn-add"
                                        style="margin-bottom:10px;" type="button" id="show-modal"
                                        data-action="edit" data-key="<?= $item->slug_menu ?>">
                                    <i class="fas fa-cogs"></i>
                                </button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6" style="text-align: center; font-style: italic">Data is empty!</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div id="modal-detail"></div>
