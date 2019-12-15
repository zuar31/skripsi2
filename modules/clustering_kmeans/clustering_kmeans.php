<?php
$aksi = "modules/clustering_kmeans/aksi_clustering_kmeans.php";
$act = $_GET['act'];

switch ($act) {
    // Tampil form
    default:
        ?>
        <div class="page">
                <div class="page-header">
                    <h1 class="page-title">Form Periode</h1>               
                </div>  
        <div class="page-content">
            <div class="panel">
            <div class="panel-body">
                <div class="example-wrap">
                    <div class="example datepair-wrap" data-plugin="datepair">
                        <form>
                        <table width="60%" style="margin-bottom:2em">
                            <tr>
                                <td width="45%">
                                    <div class="input-daterange-wrap">
                                        <div class="input-daterange">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="icon wb-calendar" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" value="<?php echo date('m/d/Y')?>" class="form-control datepair-date datepair-start" data-plugin="datepicker">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="icon wb-time" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" value="<?php echo date('H:i')?>" class="form-control datepair-time datepair-start" data-plugin="timepicker"
                                                       />
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td width="10%" style="text-align:center"><div class="input-daterange-to">to</div></td>
                                <td width="45%">
                                    <div class="input-daterange-wrap">
                                        <div class="input-daterange">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="icon wb-calendar" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" value="<?php echo date('m/d/Y')?>" class="form-control datepair-date datepair-end" name="end" data-plugin="datepicker">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="icon wb-time" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" value="<?php echo date('H:i')?>" class="form-control datepair-time datepair-end" data-plugin="timepicker"
                                                       />
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td align="right"><a href="#" class="btn btn-primary btn-md">Proses</a></td>
                            </tr>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
            </div>
            </div>

            <div class="page">
                <div class="page-header">
                    <h1 class="page-title">Table Periode Alert </h1>               
                </div>            

                <div class="page-content">
                    <!-- Panel Basic -->
                    <div class="panel">
                        <header class="panel-heading">
                            <div class="panel-actions"></div>
                            <!-- <h3 class="panel-title">Basic</h3> -->
                            <div class="row col-md-12">
                                <div class="col-md-6"></div>                         
                            </div>
                        </header>
                        <br/>
                        <div class="panel-body">
                            <table class="table table-hover dataTable table-bordered w-full" id="tabel">
                                <thead>
                                    <tr>
                                        <th>IP Source</th>
                                        <th>IP DestinationJumlah Alert </th>
                                        <th>Signature Name</th>
                                        <th>Port Destination</th>
                                        <th>Jumlah Alert</th>
                                        <th>Durasi</th>
                                        <th>Layer Protokol (s)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tampil = mysqli_query($koneksi, "SELECT ip_src ,"
                                            . " ip_dst,"
                                            . " ip_proto,"
                                            . " layer4_dport,"
                                            . " sig_name as sig,"
                                            . " count(sid) as jumlahalert,"
                                            . " count(DISTINCT(ip_src)) as count_ip_src,"
                                            . " count(DISTINCT(ip_dst)) as count_ip_dst,"
                                            . " MIN(timestamp) as first, "
                                            . " MAX(timestamp)as last"
                                            . " FROM view_acid_event group by sig_name, ip_src, ip_dst");
                                    $no = 1;
                                    while ($r = mysqli_fetch_array($tampil)) {

                                        $date = new DateTime($r['first']);
                                        $date2 = new DateTime($r['last']);
                                        $diff = $date2->getTimestamp() - $date->getTimestamp();
                                        ?>
                                        <!-- Proses tampil data training -->
                                        <tr>
                                            <td><?= long2ip($r['ip_src']) ?></td>
                                            <td><?= long2ip($r['ip_dst']) ?></td>
                                            <td><?= $r['sig'] ?></td>
                                            <td><?= $r['layer4_dport'] ?></td>
                                            <td><?= $r['jumlahalert'] ?></td> 
                                            <td><?= $diff ?></td>
                                            <td><?= getprotobynumber($r['ip_proto']) ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- End Panel Basic -->
                </div>
            </div>
            <div class="page-header">
                    <h1 class="page-title">Table Centroid </h1>               
            </div>
            <div class="page-content">
                    <!-- Panel Basic -->
                    <div class="panel">
                        <header class="panel-heading">
                            <div class="panel-actions"></div>
                            <!-- <h3 class="panel-title">Basic</h3> -->
                            <div class="row col-md-12">
                                <div class="col-md-6"></div>                         
                            </div>
                        </header>
                        <br/>
            <div class="panel-body">
                            <table class="table table-hover dataTable table-bordered w-full" id="tabel">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Centroid JumlahAlert</th>
                                        <th>Centroid Durasi</th>
                                        <th>Centroid Pada Cluster</th>
                                        <th>Keterangan</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                </tbody>
                            </table>
                        </div>
            
        </div>
        <?php
        break;

    // Form hasil
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
}
?>  
