<?php 
$this->load->view('layout/head');
$this->load->view('layout/header');
$this->load->view('layout/body');
$this->load->view('layout/aside');
$this->load->view('layout/content-wrapper');
 ?>
 <section class="content">
 	<div class="row">
        <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                    <br />
                    <?php
                      echo anchor('pembelian/add_pembelian','<i class="glyphicon glyphicon-plus"></i>Tambah',array('class'=>'btn btn-primary'))
                  ?>
                </div>
                <br />
        <div class="box-body table-responsive no-padding">
                <table id="example1" class="table table-bordered table-striped" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="30px">No</th>
                            <th>Kode Pembelian</th>
                            <th>Nomor Nota</th>
                            <th>Tanggal Nota</th>
                            <th>Supplier</th>
                            <th>Tanggal Terima</th>
                            <th>Total</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $no=1;
                      foreach ($rec as $r) 
                      {
                      ?>                     
                          <tr>
                            <td width='10'><?php echo $no;?></td>
                            <td><?php echo $r->pembelian_kode;?></td>
                            <td><?php echo $r->nomor_nota;?></td>
                            <td><?php echo date('d M Y',strtotime($r->tanggal_nota));?></td>
                            <td><?php echo $r->supplier_nama;?></td>
                            <td><?php echo date('d M Y',strtotime($r->tanggal_terima));?></td>
                            <td><?php echo "Rp ".number_format($r->total_pembelian,2,',','.');?></td>               
                            <td width='10'><?php echo anchor("pembelian/edit/".$r->pembelian_kode,"<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>",array('class'=>'btn btn-primary','title'=>'edit data')) ?></td>
                            <td width='10'><?php echo anchor("pembelian/delete/".$r->pembelian_kode,"<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>",array('class'=>'btn btn-danger','title'=>'hapus data','onclick'=>"return confirm('Anda Yakin akan menghapus data ini?')")) ?></td>
                          </tr>   
                      <?php ++$no; 
                      }
                      ?>               
                    </tbody>
         
                    <tfoot>
                    <tr>
                       <th width="30px">No</th>
                       <th>Kode Pembelian</th>
                       <th>Nomor Nota</th>
                       <th>Tanggal Nota</th>
                       <th>Supplier</th>
                       <th>Tanggal Terima</th>
                       <th>Total</th>
                      <th></th>
                      <th></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
     </div>
 </section>
  <?php 
$this->load->view('layout/main-footer');
$this->load->view('layout/control-sidebar');
$this->load->view('layout/footer');
?>