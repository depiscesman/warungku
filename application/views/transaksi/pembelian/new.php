<?php 
$this->load->view('layout/head');
$this->load->view('layout/header');
$this->load->view('layout/body');
$this->load->view('layout/aside');
$this->load->view('layout/content-wrapper');
?>
<section class="col-lg-4 connectedSortable">
 	<div class="row">
        <div class="col-xs-12">
            <div class="box">
              <div class="box-header">              	
                <h3 class="box-title">Add Pembelian</h3>
              </div>
              <div class="box-body">
              <div class="form-group">
                  <label>Kode</label>
                    <input type="text" name="pembelian_kode" class="form-control" value="<?php echo $kode;?>">
                </div>
                <div class="form-group">
                  <label>Nomor Nota</label>
                     <input type="text" name="nomor_nota" class="form-control" value="<?php echo set_value('nomor_nota'); ?>" placeholder="Enter ...">
                  <td><?php echo form_error('nomor_nota', '<span>', '</span>'); ?></td>
                </div>
                <div class="form-group">
                    <label>Tanggal Nota</label>
                        <input type="text" name="tanggal_nota" class="form-control datepicker" data-date-format="yyyy-mm-dd" value="<?php echo set_value('tanggal_nota');?>" placeholder="dd-mm-yyyy">
                </div>
                <div class="form-group">
                    <label>Tanggal Terima</label>
                        <input type="text" name="tanggal_terima" class="form-control datepicker" data-date-format="yyyy-mm-dd" value="<?php echo set_value('tanggal_nota');?>" placeholder="dd-mm-yyyy">
                </div>
                <div class="form-group">
                  <label>Supplier</label>
                    <select class="form-control select2" name="supplier_id">
                      <option value="<?php echo set_value('supplier_id'); ?>"></option>
                      <?php foreach ($supplier as $s) {?>
                        <option value="<?php echo $s->supplier_id?>"><?php echo $s->supplier_nama;?></option>
                       <?php } ?>
                    </select>
                    <td><?php echo form_error('supplier_id', '<span>', '</span>'); ?></td>
                  </div>
              </div>
              </div>
        </div>
    </div>
</section>

<section class="col-lg-8 connectedSortable">
  <div class="nav-tabs-custom">
    <div class="box box-info">
    <div class="box-header">
                <i class="fa "></i>
                <h3 class="box-title">Total Pembelian</h3>
              
            </div>
            <div class="box-body">
              
          </div>
  </div> 
  </div> 
  <div class="nav-tabs-custom">
    <div class="box box-info">
      <div class="box-header">
                Terbilang
            </div>
            <div class="box-body">
           
            </div>
    </div>
  </div>  

  <div class="nav-tabs-custom">
    <div class="box box-info">
      <div class="box-header">
          <i class="fa "></i>
             <h3 class="box-title"></h3>              
            </div>
            <div class="box-body">
            <?php echo anchor('pembelian','Kembali',array('class'=>'btn btn-danger')); ?>
             <button class="btn btn-success" onclick="add()"><i class="glyphicon glyphicon-plus"></i> Add</button>
                  
            <button class="pull-right btn btn-default" name="submit" type="submit">Simpan<i class="fa fa-arrow-circle-right"></i></button>
            </div>
        </div>
    </div>
 </section>


<section class="content">
 	<div class="row">
        <div class="col-xs-12">
            <div class="box">
              
                <br />
        <div class="box-body table-responsive no-padding">
                  <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="30px">No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                            <th style="width:60px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
         
                    <tfoot>
                   <tr>
                      <th style="text-align: right;" colspan="6">Total</th>
                      <th></th>
                    </tr>
                    </tfoot>
                    
                </table>
            </div>
  
            	<div class="box-footer clearfix">
            	
          	</div>
        </div>
     </div>
 </section>


<?php 
$this->load->view('layout/main-footer');
$this->load->view('layout/control-sidebar');
$this->load->view('layout/footer');
$this->load->view('transaksi/pembelian/aksi');
$this->load->view('transaksi/pembelian/modal');
?>