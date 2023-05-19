<form class="form-horizontal" method="POST" action="<?= 'companyProfile/update' ?>" enctype="multipart/form-data">
    <div class="form-group row">
        <label for="input_name" class="col-sm-2 col-form-label">Owner</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="owner" name="owner"
                   value="<?= $data->owner ?>"
                   placeholder="Owner">
        </div>
    </div>

    <div class="form-group row">
        <label for="input_name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="name" name="name"
                   value="<?= $data->name ?>"
                   placeholder="Name">
        </div>
    </div>

    <div class="form-group row">
        <label for="input_name" class="col-sm-2 col-form-label">Alias</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="alias" name="alias"
                   value="<?= $data->alias ?>"
                   placeholder="Alias">

            <input type="hidden" class="form-control" id="id" name="id"
                   value="<?= $data->id ?>"
                   placeholder="ID">
        </div>
    </div>

    <div class="form-group row">
        <label for="input_name" class="col-sm-2 col-form-label">Version</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="version" name="version"
                   value="<?= $data->version ?>"
                   placeholder="Version">
        </div>
    </div>

    <div class="form-group row">
        <label for="input_name" class="col-sm-2 col-form-label">Year</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="year" name="year"
                   value="<?= $data->year ?>"
                   placeholder="Year">
        </div>
    </div>

    <div class="form-group row">
        <label for="input_name" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-6">
            <textarea type="text" class="form-control" id="description" name="description"
                      placeholder="Description"><?= $data->description ?></textarea>
        </div>
    </div>

    <div class="form-group row">
        <label for="input_name" class="col-sm-2 col-form-label">Company</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="company" name="company"
                   value="<?= $data->company ?>"
                   placeholder="Name">
        </div>
    </div>

    <div class="form-group row">
        <label for="input_name" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="phone" name="phone"
                   value="<?= $data->phone ?>"
                   placeholder="Phone">
        </div>
    </div>

    <div class="form-group row">
        <label for="input_name" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="email" name="email"
                   value="<?= $data->email ?>"
                   placeholder="Email">
        </div>
    </div>

    <div class="form-group row">
        <label for="input_name" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-8">
            <textarea type="text" class="form-control" id="address" name="address" placeholder="Address"><?= $data->address ?></textarea>
        </div>
    </div>

    <div class="form-group row">
        <label for="input_name" class="col-sm-2 col-form-label">Website</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="website" name="website"
                   value="<?= $data->website ?>"
                   placeholder="Website">
        </div>
    </div>

    <div class="form-group row">
        <label for="input_name" class="col-sm-2 col-form-label">Instagram</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="ig_name" name="ig_name"
                   value="<?= $data->ig_name ?>"
                   placeholder="Instagram">
        </div>
    </div>

    <div class="form-group row">
        <label for="input_name" class="col-sm-2 col-form-label">URL Instagram</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="ig_url" name="ig_url"
                   value="<?= $data->ig_url ?>"
                   placeholder="URL Instagram">
        </div>
    </div>

    <div class="form-group row">
        <label for="input_logo" class="col-sm-2 col-form-label">Logo</label>
        <div class="col-sm-8">
            <input type="file" class="form-control" id="logo" name="logo" value="" placeholder="Logo">
        </div>
    </div>

    <div class="card-footer">
        <button type="submit"
                class="btn btn-info float-right">Update Company</button>
    </div>
</form>