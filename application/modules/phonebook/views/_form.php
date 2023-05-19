<?php
$link = 'phonebook/phonebook/create';
if (!$isNewRecord) {
    $link = 'phonebook/phonebook/update';
}

?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Create Phonebook</h3>
            </div>
            <form class="form-horizontal" method="POST" action="<?php echo base_url($link); ?>"
                  enctype="multipart/form-data">
                <div class="card-body">
                    <!-- HIDDEN FORM -->
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="isNewRecord" name="isNewRecord"
                                   value="<?= (!$isNewRecord) ? 'false' : 'true' ?>" placeholder="isNewRecord">

                            <input type="hidden" class="form-control" id="id" name="id"
                                   value="<?= (!$isNewRecord) ? $data->id : '' ?>" placeholder="id">

                            <input type="hidden" class="form-control" id="status" name="status"
                                   value="<?= (!$isNewRecord) ? $data->status : '' ?>" placeholder="status">
                        </div>
                    </div>
                    <!-- HIDDEN FORM -->

                    <div class="form-group row">
                        <label for="input_name" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                   value="<?= (!$isNewRecord) ? $data->first_name : '' ?>" placeholder="First Name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_name" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                   value="<?= (!$isNewRecord) ? $data->last_name : '' ?>" placeholder="Last Name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_name" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="phone_number" name="phone_number"
                                   value="<?= (!$isNewRecord) ? $data->phone_number : '' ?>" placeholder="Phone Number">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_name" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="email" name="email"
                                   value="<?= (!$isNewRecord) ? $data->email : '' ?>" placeholder="Email">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit"
                                class="btn btn-info float-right"><?= ($isNewRecord) ? 'Create Data' : 'Update Data' ?></button>
                    </div>
            </form>


        </div>
    </div>
</div>

