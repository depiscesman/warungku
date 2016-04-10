  <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Warung ku</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
         
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Data Master</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <?php 
                 echo '<li>'.anchor('barang',' <i class="fa fa-industry"></i>Barang').'</li>';
                 echo '<li>'.anchor('kategori',' <i class="fa fa-chrome"></i>Kategori').'</li>';
                 echo '<li>'.anchor('satuan',' <i class="fa fa-map-pin"></i>Satuan').'</li>';
              ?>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-street-view"></i> <span>Data Kontak</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <?php
                 echo '<li>'.anchor('pelangan',' <i class="fa fa-odnoklassniki"></i>Pelangan').'</li>';
                 echo '<li>'.anchor('supplier',' <i class="fa fa-odnoklassniki"></i>Supplier').'</li>';
              ?>
              </ul>
            </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i> <span>Transaksi</span> 
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <?php 
                 echo '<li>'.anchor('pembelian',' <i class="fa fa-circle-o"></i>Pembelian').'</li>';                
                 echo '<li>'.anchor('penjualan',' <i class="fa fa-circle-o"></i>Penjualan').'</li>'; 
              ?>
              </ul>
            </li>
            
        </section>
        <!-- /.sidebar -->
      </aside>