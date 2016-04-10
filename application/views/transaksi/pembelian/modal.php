
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
                    <input type="hidden" name="pembelian_kode" value="<?php echo $kode;?>">
                    <div class="form-body">
                        <div class="form-group">
                             <label class="control-label col-md-3">Barang</label>
                            <div class="col-md-9">
                                <select name="barang_id" class="form-control">
                                    <option value="">--Pilih Barang--</option>
                                    <?php foreach ($barang as $b) { ?>
                                       <option value="<?php echo $b->barang_id; ?>"><?php echo $b->barang_nama;?></option>
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
                            <label class="control-label col-md-3">Quantity</label>
                            <div class="col-md-9">
                                <input name="qty_pembelian" id="qp" placeholder="Quantity Barang" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Harga</label>
                            <div class="col-md-9">
                                <input name="harga_beli" id="hb" placeholder="Barang Keluar" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Total</label>
                            <div class="col-md-9">
                                <input name="sub_total" id="st" placeholder="Total" class="form-control" type="text">
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
