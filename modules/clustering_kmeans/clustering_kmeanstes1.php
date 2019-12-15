<?php
$aksi = "modules/clustering_kmeans/aksi_clustering_kmeanstes1.php";
$act = $_GET['act'];

switch ($act) {
    // Tampil form
    default:

        $start_date = empty($_GET['start_date']) ? date('m/d/Y') : $_GET['start_date'];
        $start_time = empty($_GET['start_time']) ? date('00:00:00') : $_GET['start_time'];
        $end_date = empty($_GET['end_date']) ? date('m/d/Y') : $_GET['end_date'];
        $end_time = empty($_GET['end_time']) ? date('23:59:00') : $_GET['end_time'];

        $start = date('Y-m-d', strtotime($start_date)) . ' ' . date('H:i:s', strtotime($start_time));
        echo $start;
        $end = date('Y-m-d', strtotime($end_date)) . ' ' . date('H:i:s', strtotime($end_time));
        echo $end;
//echo $start_date;
//echo $start_time;
//echo $end_date;
//echo $end_time;
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
                                                            <input type="text" value="<?php echo $start_date ?>" class="form-control datepair-date datepair-start" name="start_date" data-plugin="datepicker">
                                                        </div>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="icon wb-time" aria-hidden="true"></i>
                                                            </span>
                                                            <input type="text" value="<?php echo $start_time ?>" class="form-control datepair-time datepair-start" name="start_time" data-plugin="timepicker"
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
                                                            <input type="text" value="<?php echo $end_date ?>" class="form-control datepair-date datepair-end" name="end_date" data-plugin="datepicker">
                                                        </div>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="icon wb-time" aria-hidden="true"></i>
                                                            </span>
                                                            <input type="text" value="<?php echo $end_time ?>" class="form-control datepair-time datepair-end" name="end_time" data-plugin="timepicker"
                                                                   />
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                        <input type="hidden" name="module" value="clustering_kmeans">
                                        <td align="right"><button type="submit" class="btn btn-primary btn-md">Proses</button></td>
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
                                    $max[1] = 0;
                                    $min[1] = 1000000000;
                                    $max[2] = 0;
                                    $min[2] = 1000000000;
                                    $tampil = mysqli_query($koneksi, "SELECT ip_src,"
                                            . " ip_dst,"
                                            . " ip_proto,"
                                            . " layer4_dport,"
                                            . " sig_name as sig,"
                                            . " count(sid) as jumlahalert,"
                                            . " count(DISTINCT(ip_src)) as count_ip_src,"
                                            . " count(DISTINCT(ip_dst)) as count_ip_dst,"
                                            . " MIN(timestamp) as first, "
                                            . " MAX(timestamp) as last"
                                            . " FROM view_acid_event"
                                            . " WHERE timestamp between '$start' and '$end'"
                                            . " GROUP by sig_name, ip_src, ip_dst"
                                            . " ORDER BY timestamp ASC");
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
                                        $x[$no][1] = $r['jumlahalert'];
                                        $x[$no][2] = $diff;

                                        if ($max[1] < $x[$no][1]) {
                                            $max[1] = $x[$no][1];
                                        }

                                        if ($min[1] > $x[$no][1]) {
                                            $min[1] = $x[$no][1];
                                        }
                                        if ($max[2] < $x[$no][2]) {
                                            $max[2] = $x[$no][2];
                                        }

                                        if ($min[2] > $x[$no][2]) {
                                            $min[2] = $x[$no][2];
                                        }


                                        $no++;
                                    }
                                    ?>

                                    <?php
                                    ?>
                                </tbody>
                            </table>

                            <?php
                            print "<pre>";
                            $k = 3;
                            echo 'data x ';
                            print_r($x);
                            
                            print "</pre>";
                            print "<pre>";
                            echo 'data max jumlah alert dan durasi ';
                            print_r($max);
                            echo 'data min jumlah alert dan durasi ';
                            print_r($min);
                            print "</pre>";

                            $interval[1] = ($max[1] - $min[1]) / $k;
                            $interval[2] = ($max[2] - $min[2]) / $k;
                            
                            
                            print "<pre>";
                            echo 'data interval jumlah alert dan durasi ';
                            print_r($interval);
                            print "</pre>";


                            $xc[1][1] = $min[1] + (2 * $interval[1]);
                            $xc[2][1] = $min[2];

                            $xc[1][2] = $min[1] + (1 * $interval[1]);
                            $xc[2][2] = $min[2] + (1 * $interval[2]);

                            $xc[1][3] = $min[1];
                            $xc[2][3] = $min[2] + (2 * $interval[2]);
                            
                            print "<pre>";
                            echo 'data centroid pada cluster ';
                            print_r($xc);
                            print "</pre>";


                            foreach ($x as $key => $value) {
                                $d[$key][1] = sqrt(pow(($x[$key][1] - $xc[1][1]), 2) + pow(($x[$key][2] - $xc[2][1]), 2));
                                $d[$key][2] = sqrt(pow(($x[$key][1] - $xc[1][2]), 2) + pow(($x[$key][2] - $xc[2][2]), 2));
                                $d[$key][3] = sqrt(pow(($x[$key][1] - $xc[1][3]), 2) + pow(($x[$key][2] - $xc[2][3]), 2));
                            }
                            
                            print "<pre>";
                            echo 'jarak cluster data x ';
                            print_r($d);
                            print "</pre>";
                     
                            ?>
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
                                    <th>Centroid Jumlah Alert</th>
                                    <th>Centroid Durasi</th>
                                    <th>Centroid Pada Cluster</th>
                                    <th>Keterangan</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no=2;
                                $tipe_serangan[1]='Serangan Berbahaya';
                                $tipe_serangan[2]='Serangan Agak Berbahaya';
                                $tipe_serangan[3]='Serangan Tidak Berbahaya';
                                for($i=1;$i<=3;$i++)
                                {
                                    echo('<tr>');
                                    echo('<td>'.$i.'</td>');
                                    echo('<td>Cluster '.$i.'&nbsp&nbsp&nbsp&nbspK'.$no.'=&nbsp&nbsp&nbsp&nbsp'.$xc[1][$i].'</td>');
                                    echo('<td>Cluster '.$i.'&nbsp&nbsp&nbsp&nbspK'.$no.'=&nbsp&nbsp&nbsp&nbsp'.$xc[2][$i].'</td>');
                                    echo('<td>('.$xc[1][$i].'&nbsp&nbsp&nbsp&nbsp,&nbsp&nbsp&nbsp&nbsp'.$xc[2][$i].')</td>');
                                    echo '<td>'. $tipe_serangan[$i].'</td>';
                                    echo('</tr>');
                                    $no--;
                                }
                                ?>
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
