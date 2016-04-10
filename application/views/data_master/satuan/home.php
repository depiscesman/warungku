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
                    <button class="btn btn-success" onclick="add()"><i class="glyphicon glyphicon-plus"></i> Add</button>
                    <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                </div>
                    <br />
                    <br />
        <div class="box-body">

                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="30px">No</th>
                            <th>Kode Satuan</th>
                            <th>Keterangan</th>
                            <th style="width:125px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
         
                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kode Satuan</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        </div>
    </div>
 </section>
<?php 
$this->load->view('layout/main-footer');
$this->load->view('layout/control-sidebar');
$this->load->view('layout/footer');
$this->load->view('data_master/satuan/aksi');
$this->load->view('data_master/satuan/modal');
?>