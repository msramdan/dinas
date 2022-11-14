<div class="page-title-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="page-title-content">
                    <h2>Info Komoditas</h2>
                    <ul>
                        <li><a href="<?= base_url() ?>">Home</a></li>
                        <li>Info Komoditas</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="contact-area ptb-50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3" style="margin-top: 2px;">
                        <div class="form-group">
                            <label for=""> <b>Filter By Komoditas</b> </label>
                            <select class="" aria-label="Default select example" id="komoditas">
                                <option value="">All</option>
                                <?php foreach ($fKomoditas as $v) : ?>
                                <option value="<?= $v->produk_id ?>"><?= $v->nama_produk ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2" style="margin-top: 2px;">
                        <div class="form-group">
                            <label for=""> <b>Sumber Data</b> </label>
                            <select class="" aria-label="Default select example" id="sumber_data">
                                <option value="">All</option>
                                <?php foreach ($fSumberData as $s) : ?>
                                <option value="<?= $s->dinas_id ?>"><?= $s->nama_dinas  ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2" style="margin-top: 2px;">
                        <div class="form-group">
                            <label for=""> <b>Kelompok/Agent</b> </label>
                            <select class="" aria-label="Default select example" id="kelompok">
                                <option value="">All</option>
                                <?php foreach ($fKelompok as $k) : ?>
                                <option value="<?= $k->kelompok ?>"><?= $k->kelompok ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2" style="margin-top: 2px;">
                        <div class="form-group">
                            <label for=""> <b>Bulan & Tahun</b> </label>
                            <input type="month" class="form-control" id="bulan_tahun">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2" style="margin-top: 2px;">
                        <div class="form-group">
                            <label for=""> <b>Minggu Ke</b> </label>
                            <select class="" aria-label="Default select example" id="minggu">
                                <option value="">All</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="3">4</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1" style="margin-top: 2px;">
                        <div class="form-group">
                            <label for=""> <b>
                                </b> </label><br>
                            <button class="btn btn-primary" id="filter-btn"><i class="fa fa-search"
                                    aria-hidden="true"></i>
                                Filter</button>
                        </div>
                    </div>
                </div><br>
                <button id="exportExcel" class="btn btn-success"> <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                    Download
                    Excel</button> <br><br>
                <div class="box-body" style="overflow-x: scroll; ">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tgl Update</th>
                                <th>Produk</th>
                                <th>Sumber</th>
                                <th>Kelompok</th>
                                <th>Stok</th>
                                <th>Rencana Produksi</th>
                                <th>Ketahanan Bulanan</th>
                                <th>Bulan Tahun</th>
                                <th>Data Minggu</th>
                                <th>Produksi Mingguan</th>
                                <th>Produksi Harian</th>
                                <th>Harga Total Produksi</th>
                                <th>Harga Dari Produsen</th>
                                <th>Harga Pedagang</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th colspan="4"></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th style="background-color: #ccccff"></th>
                                <th style="background-color: #ccccff"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>

        </div>
    </div>
</section>
