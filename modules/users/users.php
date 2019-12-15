<?php
$aksi = "modules/users/aksi_users.php";
$act = $_GET['act'];

switch ($act) {
    // Tampil kriteria
    default:
        ?>
        <div class="page-content">

            <div class="page">
                <div class="page-header">
                    <h1 class="page-title">Users</h1>
                    <!--        <div class="page-header-actions">
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../layout/topbar.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Users</li>
                              </ol>
                            </div>-->
                </div>
                <!--      <div class="alert alert-dismissible" role="alert" style="display:none">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <span id="message"></span>
                        </div>-->

                <div class="page-content">

                    <!-- Panel Basic -->
                    <div class="panel">
                        <header class="panel-heading">
                            <div class="panel-actions"></div>
                            <!-- <h3 class="panel-title">Basic</h3> -->
                            <div class="row col-md-12">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6" style="text-align: right">
                                    <br/>
                                    <a class="btn btn-primary " href="?module=users&act=add" id="batal">Add User</a>
                                </div>
                            </div>
                        </header>
                        <br/>
                        <div class="panel-body">
                            <table class="table table-hover dataTable table-striped w-full" id="tabel">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Username </th>
                                        <th>Alamat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tampil = mysqli_query($koneksi, "SELECT * FROM admin");
                                    $no = 1;
                                    while ($r = mysqli_fetch_array($tampil)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $r['nama'] ?></td>
                                            <td><?php echo $r['username'] ?></td>
                                            <td><?php echo $r['alamat'] ?></td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href='?module=users&act=edit&id=<?php echo $r['id'] ?>'><i class="icon glyphicon glyphicon-edit" aria-hidden="true"></i> Edit</a> &nbsp&nbsp 
                                                <a class="btn btn-sm btn-danger" href='<?= $aksi ?>?module=users&act=delete&id=<?php echo $r[id]; ?>'><i class="icon glyphicon glyphicon-trash" aria-hidden="true"></i> Delete</a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- End Panel Basic -->
                </div>
            </div>
        </div>
        <?php
        break;

    // Form Tambah college_schedule
    case "add":
        ?>
<div class="page-content">
            <!-- Panel Basic -->
            <div class="panel">
                <div class="panel-body">
                    <form class="col-md-5" action="<?= $aksi ?>?module=users&act=input" method="POST">
                     	
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="nama" value="" placeholder="Name" autocomplete="off">
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" value="" name="username" placeholder="Username" autocomplete="off">
                            </div>
                        </div>


                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            &nbsp;
                            <a class="btn btn-danger " href="?module=users" id="batal">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        break;

    // Form Edit Kriteria
    case "edit":
        $edit = mysqli_query($koneksi,"SELECT * FROM admin WHERE id='$_GET[id]'");
        $r = mysqli_fetch_array($edit);
        ?>
        <div class="page-content">
            <!-- Panel Basic -->
            <div class="panel">
                <div class="panel-body">
                    <form class="col-md-5" action="<?= $aksi ?>?module=users&act=update" method="POST">
                     	
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="nama" value="<?= $r['nama']?>" placeholder="Name" autocomplete="off">
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" value="<?= $r['username']?>" name="username" placeholder="Username" autocomplete="off">
                            </div>
                        </div>


                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="alamat" placeholder="Alamat"><?= $r['alamat']?></textarea>
                        </div>
                        <input type="hidden" class="form-control" value="<?= $r['id']?>" name="id" >

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            &nbsp;
                            <a class="btn btn-danger " href="?module=users" id="batal">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        break;
}
?>  


