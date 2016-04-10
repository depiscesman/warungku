
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="barang_id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Kode Barang</label>
                            <div class="col-md-9">
                                <input name="barang_kode" placeholder="Kode Barang" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Barang</label>
                            <div class="col-md-9">
                                <input name="barang_nama" placeholder="Nama Barang" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Kategori</label>
                            <div class="col-md-9">
                                <select name="kategori_id" class="form-control">
                                    <option value="">--Pilih Kategori--</option>
                                    <?php foreach ($kategori as $k) { ?>
                                       <option value="<?php echo $k->kategori_id; ?>"><?php echo $k->kategori;?></option>
                                    <?php } ?>
                                    </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Satuan</label>
                            <div class="col-md-9">
                            <select name="satuan_id" class="form-control">
                                    <option value="">--Pilih Satuan--</option>
                                    <?php foreach ($satuan as $s) { ?>
                                       <option value="<?php echo $s->satuan_id; ?>"><?php echo $s->keterangan;?></option>
                                    <?php } ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Stock Awal</label>
                            <div class="col-md-9">
                                <input name="stock_awal" id="saw" placeholder="Stock Awal Barang" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Barang Keluar</label>
                            <div class="col-md-9">
                                <input name="barang_keluar" id="bk" placeholder="Barang Keluar" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Stock Akhir</label>
                            <div class="col-md-9">
                                <input name="stock_akhir" id="sak" placeholder="Stock Akhir Barang" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Harga Dasar</label>
                            <div class="col-md-9">
                                <input name="harga_dasar" placeholder="Harga Dasar" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Harga Jual</label>
                            <div class="col-md-9">
                                <input name="harga_jual" placeholder="Harga Jual" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->