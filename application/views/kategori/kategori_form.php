<div id="content" class="content">
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Dashboard</a></li>
        <li class="active">Kategori</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                            data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                            data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                            data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                            data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Data KATEGORI</h4>
                </div>
                <div class="panel-body">

                    <form action="<?php echo $action; ?>" method="post">
                        <thead>
                            <table id="data-table-default"
                                class="table  table-bordered table-hover table-td-valign-middle">
                                <tr>
                                    <td>Nama Kategori <?php echo form_error('nama_kategori') ?></td>
                                    <td><input type="text" class="form-control" name="nama_kategori" id="nama_kategori"
                                            placeholder="Nama Kategori" value="<?php echo $nama_kategori; ?>" /></td>
      
                          </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="kategori_id" value="<?php echo $kategori_id; ?>" />
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i>
                                            <?php echo $button ?></button>
                                        <a href="<?php echo site_url('kategori') ?>" class="btn btn-info"><i
                                                class="fa fa-undo"></i> Kembali</a>
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