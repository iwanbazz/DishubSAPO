      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="./image/<?php echo $row['img'];?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $row['nama']; ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php if(!isset($_GET['page'])){echo 'active treeview';}?>">
              <a href="./">
                <i class="fa fa-home"></i> <span>Home</span>
              </a>
            </li>
            <li class="<?php if($_GET['page']=='info'||$_GET['page']=='add_info'){echo 'active treeview';}?>">
              <a href="#">
                <i class="fa fa-plus"></i> <span>Control Panel</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?page=add_info"><i class="fa fa-plus"></i> Informasi</a></li>
                <li><a href="?page=info"><i class="fa fa-edit"></i> Data Informasi</a></li>
              </ul>
            </li>
            <li class="<?php if($_GET['page']=='user'){echo 'active treeview';}?>">
              <a href="?page=user">
                <i class="fa fa-book"></i> <span>Permintaan Izin</span>
                <small class="label pull-right bg-yellow">
                <?php
                  echo mysqli_num_rows(mysqli_query($con,"select * from tbl_berkas where acc='0'"));
                ?>
                </small>
              </a>
            </li>
            <li class="<?php if($_GET['page']=='pertemuan'){echo 'active treeview';}?>">
              <a href="?page=pertemuan">
                <i class="glyphicon glyphicon-calendar"></i> <span>Permintaan Pertemuan</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>