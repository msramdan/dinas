<div id="content" class="content">
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Dashboard</a></li>
        <li class="active">Banner</li>
    </ol>
    <div class="row">
        <?php if (!empty($this->session->flashdata('error'))) : ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Data Banner</h4>
                </div>
                <div class="panel-body">

                    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                        <thead>
                            <table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
                                <?php if (isset($row)) : ?>
                                    <tr>
                                        <td>Preview</td>
                                        <td><img src="<?= base_url($row->url) ?>" alt="" width="400" id="banner"></td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <td>Banner</td>
                                    <td>
                                        <div class="form-control-file">
                                            <input type="file" onchange="loadFile(event)" class="custom-file-input" name="banner" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('banner') ?>" class="btn btn-info"><i class="fa fa-undo"></i> Kembali</a>
                                    </td>
                                </tr>
                        </thead>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var loadFile = function(event) {
        var output = document.getElementById('banner');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>