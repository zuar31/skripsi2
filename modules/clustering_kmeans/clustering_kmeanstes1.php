<?php
$aksi = "modules/rekap/rekap.php";
$act = $_GET['act'];

switch ($act) {
    // Tampil form
    default:

        $start_date = empty($_GET['start_date']) ? date('m/d/Y') : $_GET['start_date'];
        $start_time = empty($_GET['start_time']) ? date('00:00:00') : $_GET['start_time'];
        $end_date = empty($_GET['end_date']) ? date('m/d/Y') : $_GET['end_date'];
        $end_time = empty($_GET['end_time']) ? date('23:59:00') : $_GET['end_time'];

        $start = date('Y-m-d', strtotime($start_date)) . ' ' . date('H:i:s', strtotime($start_time));
//        echo $start;
        $end = date('Y-m-d', strtotime($end_date)) . ' ' . date('H:i:s', strtotime($end_time));

        $tipe_serangan[1] = 'High';
        $tipe_serangan[2] = 'Medium';
        $tipe_serangan[3] = 'Low';
//        echo $end;
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
                                                            <input type="text" value="<?php echo isset($start_date)?date('m/d/Y',strtotime($start_date)):date('m/d/Y'); ?>" class="form-control datepair-date datepair-start" name="start_date" data-plugin="datepicker">
                                                        </div>
   
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="icon wb-time" aria-hidden="true"></i>
                                                            </span>
                                                            <input type="text" value="<?php echo isset($start_date)?date('00:00:00',strtotime($start_date)):date('00:00:00'); ?>" class="form-control datepair-time datepair-start" name="start_time" data-plugin="timepicker"
                                                                   />
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="10%" style="text-align:center"><div class="input-daterange-to">to</div></td>
                                            <td width="45%">
                                                  <div class="input-daterange-wrap">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="icon wb-time" aria-hidden="true"></i>
                                                                </span>
                                                                <input type="text" value="<?php echo isset($end_time)?date('23:59:00',strtotime($end_time)):date('H:i:s'); ?>" class="form-control datepair-time datepair-end" name="end_time" data-plugin="timepicker"
                                                                   />
                                                            </div>
<!--                                                <div class="input-daterange-wrap">
                                                    <div class="input-daterange">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="icon wb-calendar" aria-hidden="true"></i>
                                                            </span>
                                                            <input type="text" value="<?php echo isset($end_date)?date('m/d/Y',strtotime($end_date)):date('m/d/Y'); ?>" class="form-control datepair-date datepair-end" name="end_date" data-plugin="datepicker">
                                                        </div>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="icon wb-time" aria-hidden="true"></i>
                                                            </span>
                                                            <input type="text" value="<?php echo isset($end_date)?date('H:i:s',strtotime($end_date)):date('H:i:s'); ?>" class="form-control datepair-time datepair-end" name="end_time" data-plugin="timepicker"
                                                                   />
                                                        </div>
                                                    </div>
                                                </div>-->
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

            <?php
            if(!empty($_GET['start_date'])){
            ?>
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
                            <table class="table table-hover table-bordered w-full" >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>IP Source</th>
                                        <th>IP Destination</th>
                                        <th>Signature Name</th>
                                        <th>Port Destination</th>
                                        <th>Jumlah Alert</th>
                                        <th>Durasi(s)</th>
                                        <th>Layer Protokol</th>

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
                                            . " GROUP by ip_src"
                                            . " ORDER by MIN(timestamp)");
                                    $no = 1;
                                    
                                    while ($r = mysqli_fetch_array($tampil)) {
//                                        var_dump($r);
                                        $date = new DateTime($r['first']);
                                        $date2 = new DateTime($r['last']);
                                        $diff = $date2->getTimestamp() - $date->getTimestamp();
                                        ?>
                                        <!-- Proses tampil data training -->
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo long2ip($r['ip_src'])?></td>
                                            <td><?php echo long2ip($r['ip_dst'])?></td>
                                            <td><?php echo $r['sig']?></td>
                                            <td><?php echo $r['layer4_dport']?></td>
                                            <td><?php echo $r['jumlahalert']?></td>
                                            <td><?php echo $diff?></td>
                                            <td><?php echo getprotobynumber($r['ip_proto'])?></td>
                                            <!--<td></td>-->
                                        </tr>
                                        
                                        <?php
                                       
//                                         echo '<pre>';
//                            echo print_r($r['jumlahalert']);
//                            echo '</pre>';
//                                        echo print_r();
                                        $x[$no]['sig'] = $r['sig'];
                                        $x[$no]['ip_src'] = long2ip($r['ip_src']);
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
                            
                                            
                            
//                            print "<pre>";
                            $k = 3;
//                            echo 'data x ';
//                            print_r($x);
//
//                            print "</pre>";
//                            print "<pre>";
//                            echo 'data max jumlah alert dan durasi ';
//                            print_r($max);
//                            echo 'data min jumlah alert dan durasi ';
//                            print_r($min);
//                            print "</pre>";

                            $interval[1] = ($max[1] - $min[1]) / $k;
                            $interval[2] = ($max[2] - $min[2]) / $k;


//                            print "<pre>";
//                            echo 'data interval jumlah alert dan durasi ';
//                            print_r($interval);
//                            print "</pre>";


                            $xc[1][1] = $min[1] + (2 * $interval[1]);
                            $xc[2][1] = $min[2];

                            $xc[1][2] = $min[1] + (1 * $interval[1]);
                            $xc[2][2] = $min[2] + (1 * $interval[2]);

                            $xc[1][3] = $min[1];
                            $xc[2][3] = $min[2] + (2 * $interval[2]);

//                            print "<pre>";
//                            echo 'data centroid pada cluster ';
//                            print_r($xc);
//                            print "</pre>";


                            foreach ($x as $key => $value) {
                                $d[$key][1] = sqrt(pow(($x[$key][1] - $xc[1][1]), 2) + pow(($x[$key][2] - $xc[2][1]), 2));
                                $d[$key][2] = sqrt(pow(($x[$key][1] - $xc[1][2]), 2) + pow(($x[$key][2] - $xc[2][2]), 2));
                                $d[$key][3] = sqrt(pow(($x[$key][1] - $xc[1][3]), 2) + pow(($x[$key][2] - $xc[2][3]), 2));
                                                                
                            }
                            
                          
//                            

//                            print "<pre>";
//                            echo 'jarak cluster data x ';
//                            print_r($d);
//                            print "</pre>";
                            ?>
                        </div>
                    </div>
                    <!-- End Panel Basic -->
                </div>
            </div>

            <!--Todo-->
            <!--max min-->

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
                        <div class="row ">
                            <div class="col-md-4 col-xl-4">

                                <div class="example-wrap">
                                    <h4 class="example-title">Jumlah Alert</h4>

                                    <ul class="list-group list-group-gap">
                                        <li class="list-group-item list-group-item-info">max : <?php echo $max[1]; ?></li>
                                        <li class="list-group-item list-group-item-success">min <?php echo $min[1]; ?></li>                     
                                    </ul>

                                </div>

                            </div>
                            <div class="col-md-4 col-xl-4">

                                <div class="example-wrap">

                                    <h4 class="example-title">Durasi</h4>

                                    <ul class="list-group list-group-gap">
                                        <li class="list-group-item list-group-item-info">max : <?php echo $max[2]; ?></li>
                                        <li class="list-group-item list-group-item-success">min : <?php echo $min[2]; ?></li>                     
                                    </ul>
                                </div>

                            </div>
                            <div class="col-md-4 col-xl-4">

                                <div class="example-wrap">
                                    <h4 class="example-title">Interval </h4>

                                    <ul class="list-group list-group-gap">
                                        <li class="list-group-item list-group-item-info">Jumlah Alert : <?php echo $interval[1]; ?></li>               

                                        <li class="list-group-item list-group-item-success">Durasi : <?php echo $interval[2]; ?></li>                     
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!--interval-->


            <!--Table Centroid--> 

            <div class="page-content">

                <div class="panel">
                    <header class="panel-heading">
                        <div class="panel-actions"></div>
                        <h3 class="panel-title">Table Centroid</h3> 
                        <div class="row col-md-12">
                            <div class="col-md-6"></div>                         
                        </div>
                    </header>
                    <!--                    <br/>-->
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
                                $no = 2;

                                for ($i = 1; $i <= 3; $i++) {
                                    echo'<tr>';
                                    echo'<td>' . $i . '</td>';
                                    echo'<td>Cluster ' . $i . '&nbsp&nbsp&nbsp&nbspK' . $no . '=&nbsp&nbsp&nbsp&nbsp' . $xc[1][$i] . '</td>';
                                    echo'<td>Cluster ' . $i . '&nbsp&nbsp&nbsp&nbspK' . $no . '=&nbsp&nbsp&nbsp&nbsp' . $xc[2][$i] . '</td>';
                                    echo'<td>(' . $xc[1][$i] . '&nbsp&nbsp&nbsp&nbsp,&nbsp&nbsp&nbsp&nbsp' . $xc[2][$i] . ')</td>';
                                    echo '<td>' . $tipe_serangan[$i] . '</td>';
                                    echo'</tr>';
                                    $no--;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>


            <!--cluster d-->
            <!--start copy-->
            <div class="col-md-12">
                <!-- Example Continuous Accordion -->
                <div class="examle-wrap">
                    <div class="example">
                        <div class="panel-group panel-group-continuous" id="exampleAccordionContinuous"
                             aria-multiselectable="true" role="tablist">
                            <div class="panel">
                                <div class="panel-heading" id="exampleHeadingContinuousOne" role="tab">
                                    <a class="panel-title" data-parent="#exampleAccordionContinuous" data-toggle="collapse"
                                       href="#exampleCollapseContinuousOne" aria-controls="exampleCollapseContinuousOne"
                                       aria-expanded="false">
                                        <b>Pembangkitan Cluster Centroid</b>
                                    </a>
                                </div>
                                <div class="panel-collapse collapse" id="exampleCollapseContinuousOne" aria-labelledby="exampleHeadingContinuousOne"
                                     role="tabpanel">
                                    <div class="panel-body">
                                        <div class="panel">
                                            <header class="panel-heading">
                                                <div class="panel-actions"></div>


                                            </header>



                                            <?php
                                            foreach ($d as $key => $value) {
                                                ?>
                                                <div class="panel-body">
                                                    <h4>Data <?= $key ?></h4>
                                                    <table class="table table-hover dataTable table-bordered w-full" id="tabel">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 20px">Cluster</th>
                                                                <th>Centroid </th>
                                                                <th>Jarak</th>


                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>(<?= $xc[1][1] ?> , <?= $xc[2][1] ?>) </td>
                                                                <td><?= $d[$key][1] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>(<?= $xc[1][2] ?> , <?= $xc[2][2] ?>) </td>
                                                                <td><?= $d[$key][2] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>(<?= $xc[1][3] ?> , <?= $xc[2][3] ?>) </td>
                                                                <td><?= $d[$key][3] ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-heading" id="exampleHeadingContinuousTwo" role="tab">
                                    <a class="panel-title collapsed" data-parent="#exampleAccordionContinuous" data-toggle="collapse"
                                       href="#exampleCollapseContinuousTwo" aria-controls="exampleCollapseContinuousTwo"
                                       aria-expanded="false">
                                        <b> Rangking Pembangkitan</b>
                                    </a>
                                </div>
                                <div class="panel-collapse collapse" id="exampleCollapseContinuousTwo" aria-labelledby="exampleHeadingContinuousTwo"
                                     role="tabpanel">
                                    <div class="panel-body">
                                        <?php
//pembangkit
                                        foreach ($x as $key => $value) {
                                            asort($d[$key]);
                                        }


                                        $cluster[1][1] = 0;
                                        $cluster[1][2] = 0;
                                        $cluster[1][3] = 0;

                                        $cluster_s[1][1][1] = 0;
                                        $cluster_s[1][2][1] = 0;
                                        $cluster_s[1][3][1] = 0;


                                        $cluster_s[1][1][2] = 0;
                                        $cluster_s[1][2][2] = 0;
                                        $cluster_s[1][3][2] = 0;

                                        foreach ($d as $key => $value) {

                                            $no = 1;
                                            foreach ($value as $key2 => $value2) {
                                                if ($no == 1) {
                                                    $result[$key]['cluster'] = $key2;
                                                    $result[$key]['nilai'] = $value2;

                                                    if ($key2 == 1) {
                                                        $cluster[1][1] += 1;

                                                        $cluster_s[1][1][1] += $x[$key][1];
                                                        $cluster_s[1][1][2] += $x[$key][2];
                                                    } else if ($key2 == 2) {
                                                        $cluster[1][2] += 1;

                                                        $cluster_s[1][2][1] += $x[$key][1];
                                                        $cluster_s[1][2][2] += $x[$key][2];
                                                    } else if ($key2 == 3) {
                                                        $cluster[1][3] += 1;

                                                        $cluster_s[1][3][1] += $x[$key][1];
                                                        $cluster_s[1][3][2] += $x[$key][2];
                                                    }
                                                }
                                                $no++;
                                            }
                                        }

//echo '<pre>';
//print_r($result);
//echo '</pre>';
                                        ?>
                                        <table class="table table-hover dataTable table-bordered w-full" id="tabel">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Ip Source</th>
                                                    <th>Jumlah Alert</th>
                                                    <th>Durasi</th>
                                                    <th>K2</th>
                                                    <th>K1</th>
                                                    <th>K0</th>
                                                    <th>Keterangan </th>         

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($d as $key => $value) {
                                                    $c1 = NULL;
                                                    $c2 = NULL;
                                                    $c3 = NULL;

                                                    if ($result[$key]['cluster'] == 1) {
                                                        $c1 = 'red';
                                                    }

                                                    if ($result[$key]['cluster'] == 2) {
                                                        $c2 = 'red';
                                                    }

                                                    if ($result[$key]['cluster'] == 3) {
                                                        $c3 = 'red';
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $x[$key]['ip_src'] ?></td>
                                                        <td><?= $x[$key][1] ?></td>
                                                        <td><?= $x[$key][2] ?></td>
                                                        <td style="color: <?= $c1 ?>"><?= $value[1] ?></td>
                                                        <td style="color: <?= $c2 ?>"><?= $value[2] ?></td>
                                                        <td style="color: <?= $c3 ?>" ><?= $value[3] ?></td>
                                                        <td><?= $tipe_serangan[$result[$key]['cluster']] ?> </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Example Continuous Accordion -->
            </div>


            <?php
            $target = 2;
            for ($ulang = 1; $ulang <= $target; $ulang++) {
//echo 'perulangan' . $ulang;
//echo '<br>';
                ?>
                <div class="col-md-12">
                    <!-- Example Continuous Accordion -->
                    <div class="examle-wrap">
                        <div class="example">
                            <div class="panel-group panel-group-continuous" id="exampleAccordionContinuous"
                                 aria-multiselectable="true" role="tablist">
                                <div class="panel">
                                    <div class="panel-heading" id="exampleHeadingContinuousTwo1<?= $ulang ?>" role="tab">
                                        <a class="panel-title collapsed" data-parent="#exampleAccordionContinuous" data-toggle="collapse"
                                           href="#exampleCollapseContinuousTwo1<?= $ulang ?>" aria-controls="exampleCollapseContinuousTwo1<?= $ulang ?>"
                                           aria-expanded="false">
                                            <b>Jumlah Cluster Perulangan ke <?= $ulang ?></b>
                                        </a>
                                    </div>
                                    <div class="panel-collapse collapse" id="exampleCollapseContinuousTwo1<?= $ulang ?>" aria-labelledby="exampleHeadingContinuousTwo1"
                                         role="tabpanel">
                                        <div class="panel-body">
                                            <?php
                                            foreach ($cluster[$ulang] as $key => $value) {
                                                @$xc[1][$key] = $cluster_s[$ulang][$key][1] / $value;
                                                @$xc[2][$key] = $cluster_s[$ulang][$key][2] / $value;
                                                
                                            }


                                            ?>
                                            <div class="col-md-6 col-xl-4">
                                                <div class="example-wrap">
                                                    <h5>Jumlah Cluster</h5>
                                                    <ul class="list-group list-group-gap">
                                                        <li class="list-group-item list-group-item-danger">Cluster 1 = <?php echo $cluster[$ulang][1]; ?></li>                                   
                                                        <li class="list-group-item list-group-item-info">Cluster 2 = <?php echo $cluster[$ulang][2]; ?></li>
                                                        <li class="list-group-item list-group-item-success">Cluster 3 = <?php echo $cluster[$ulang][3]; ?></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <h5>Table Centroid Perulangan ke <?= $ulang ?></h5> 
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
                                                    $no = 2;
//                                                    $tipe_serangan[1] = 'High';
//                                                    $tipe_serangan[2] = 'Medium';
//                                                    $tipe_serangan[3] = 'Low';
                                                    for ($i = 1; $i <= 3; $i++) {
                                                        echo'<tr>';
                                                        echo'<td>' . $i . '</td>';
                                                        echo'<td>Cluster ' . $i . '&nbsp&nbsp&nbsp&nbspK' . $no . '=&nbsp&nbsp&nbsp&nbsp' . $xc[1][$i] . '</td>';
                                                        echo'<td>Cluster ' . $i . '&nbsp&nbsp&nbsp&nbspK' . $no . '=&nbsp&nbsp&nbsp&nbsp' . $xc[2][$i] . '</td>';
                                                        echo'<td>(' . $xc[1][$i] . '&nbsp&nbsp&nbsp&nbsp,&nbsp&nbsp&nbsp&nbsp' . $xc[2][$i] . ')</td>';
                                                        echo '<td>' . $tipe_serangan[$i] . '</td>';
                                                        echo'</tr>';
                                                        $no--;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading" id="exampleHeadingContinuousThree<?= $ulang ?>" role="tab">
                                        <a class="panel-title collapsed" data-parent="#exampleAccordionContinuous" data-toggle="collapse"
                                           href="#exampleCollapseContinuousThree<?= $ulang ?>" aria-controls="exampleCollapseContinuousThree<?= $ulang ?>"
                                           aria-expanded="false">
                                            <b>Data Cluster</b>
                                        </a>
                                    </div>
                                    <div class="panel-collapse collapse" id="exampleCollapseContinuousThree<?= $ulang ?>" aria-labelledby="exampleHeadingContinuousThree"
                                         role="tabpanel">
                                        <div class="panel-body">
                                            <?php
                                            foreach ($x as $key => $value) {
                                                $d[$key][1] = sqrt(pow(($x[$key][1] - $xc[1][1]), 2) + pow(($x[$key][2] - $xc[2][1]), 2));
                                                $d[$key][2] = sqrt(pow(($x[$key][1] - $xc[1][2]), 2) + pow(($x[$key][2] - $xc[2][2]), 2));
                                                $d[$key][3] = sqrt(pow(($x[$key][1] - $xc[1][3]), 2) + pow(($x[$key][2] - $xc[2][3]), 2));
                                            }
                                            ?>

                                            <?php
                                            foreach ($d as $key2 => $value) {
                                                ?>
                                                <div class="panel-body">
                                                    <h4>Data <?= $key2 ?></h4>
                                                    <table class="table table-hover dataTable table-bordered w-full" id="tabel">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 20px">Cluster</th>
                                                                <th>Centroid </th>
                                                                <th>Jarak</th>


                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>(<?= $xc[1][1] ?> , <?= $xc[2][1] ?>) </td>
                                                                <td><?= $d[$key2][1] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>(<?= $xc[1][2] ?> , <?= $xc[2][2] ?>) </td>
                                                                <td><?= $d[$key2][2] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>(<?= $xc[1][3] ?> , <?= $xc[2][3] ?>) </td>
                                                                <td><?= $d[$key2][3] ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading" id="exampleHeadingContinuousFour<?= $ulang ?>" role="tab">
                                        <a class="panel-title collapsed" data-parent="#exampleAccordionContinuous" data-toggle="collapse"
                                           href="#exampleCollapseContinuousFour<?= $ulang ?>" aria-controls="exampleCollapseContinuousFour<?= $ulang ?>"
                                           aria-expanded="false">
                                            <b>Rangking Perulangan ke <?= $ulang ?></b>
                                        </a>
                                    </div>
                                    <div class="panel-collapse collapse" id="exampleCollapseContinuousFour<?= $ulang ?>" aria-labelledby="exampleHeadingContinuousFour"
                                         role="tabpanel">
                                        <div class="panel-body">
                                            <?php
//pertama
                                            foreach ($x as $key => $value) {
                                                asort($d[$key]);
                                            }

                                            $cluster[$ulang + 1][1] = 0;
                                            $cluster[$ulang + 1][2] = 0;
                                            $cluster[$ulang + 1][3] = 0;

                                            $cluster_s[$ulang + 1][1][1] = 0;
                                            $cluster_s[$ulang + 1][2][1] = 0;
                                            $cluster_s[$ulang + 1][3][1] = 0;


                                            $cluster_s[$ulang + 1][1][2] = 0;
                                            $cluster_s[$ulang + 1][2][2] = 0;
                                            $cluster_s[$ulang + 1][3][2] = 0;


                                            foreach ($d as $key => $value) {

                                                $no = 1;
                                                foreach ($value as $key2 => $value2) {
                                                    if ($no == 1) {
                                                        $result[$key]['cluster'] = $key2;

                                                        $result[$key]['nilai'] = $value2;

                                                        //rekap
                                                        $history[$ulang][$key] = $key2;

                                                        if ($key2 == 1) {
                                                            $cluster[$ulang + 1][1] += 1;

                                                            $cluster_s[$ulang + 1][1][1] += $x[$key][1];
                                                            $cluster_s[$ulang + 1][1][2] += $x[$key][2];
                                                        } else if ($key2 == 2) {
                                                            $cluster[$ulang + 1][2] += 1;

                                                            $cluster_s[$ulang + 1][2][1] += $x[$key][1];
                                                            $cluster_s[$ulang + 1][2][2] += $x[$key][2];
                                                        } else if ($key2 == 3) {
                                                            $cluster[$ulang + 1][3] += 1;

                                                            $cluster_s[$ulang + 1][3][1] += $x[$key][1];
                                                            $cluster_s[$ulang + 1][3][2] += $x[$key][2];
                                                        }
                                                    }
                                                    $no++;
                                                }
                                            }

//            echo '<pre>';
//            print_r($result);
//            echo '</pre>';
                                            ?>

                                            <table class="table table-hover dataTable table-bordered w-full" id="tabel">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Ip Source</th>
                                                        <th>Jumlah Alert</th>
                                                        <th>Durasi</th>
                                                        <th>K2</th>
                                                        <th>K1</th>
                                                        <th>K0</th>
                                                        <th>Keterangan </th>         

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $lanjut_ulang = FALSE;
                                                    foreach ($d as $key => $value) {
                                                        $c1 = NULL;
                                                        $c2 = NULL;
                                                        $c3 = NULL;

                                                        if ($result[$key]['cluster'] == 1) {
                                                            $c1 = 'red';
                                                        }

                                                        if ($result[$key]['cluster'] == 2) {
                                                            $c2 = 'red';
                                                        }

                                                        if ($result[$key]['cluster'] == 3) {
                                                            $c3 = 'red';
                                                        }


                                                        if ($ulang == $target) {
                                                            if ($history[$ulang][$key] != $history[$ulang - 1][$key]) {
                                                                $lanjut_ulang = TRUE;
                                                            }
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $x[$key]['ip_src'] ?></td>
                                                            <td><?= $x[$key][1] ?></td>
                                                            <td><?= $x[$key][2] ?></td>
                                                            <td style="color: <?= $c1 ?>"><?= $value[1] ?></td>
                                                            <td style="color: <?= $c2 ?>"><?= $value[2] ?></td>
                                                            <td style="color: <?= $c3 ?>" ><?= $value[3] ?></td>
                                                            <td><?= $tipe_serangan[$result[$key]['cluster']] ?> </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Example Continuous Accordion -->
                </div>

                <?php
                //cek

                if ($lanjut_ulang) {
                    $target++;
                }
            }
            ?>


        </div>


        <?PHP
        $total_serangan = count($x);
        $persentase_high = $cluster[$ulang][1] / $total_serangan * 100;
        $persentase_medium = $cluster[$ulang][2] / $total_serangan * 100;
        $persentase_low = $cluster[$ulang][3] / $total_serangan * 100;
//            echo $total_serangan;
        ?>
        <hr>
        

        <div class="page-content">
            <!-- Panel Basic -->
            <div class="panel">
                <header class="panel-heading">
                    <div class="panel-actions"></div>
                    <!-- <h3 class="panel-title">Basic</h3> -->
                    <div class="row col-md-12-center">
                        <div class="col-md-6"></div>                         
                    </div>
                </header>
                <br/>
                <div class="panel-body">
                    <div class="row ">
                        <div class="col-md-4 col-xl-4">

                            <div class="example-wrap m-md-0">
                                <!--                                <h4 class="example-title">Pie</h4>-->
                                <div>
                                    <!--                            <div class="example text-center max-width">-->
                                    <canvas id="exampleChartjsPie" height="250"></canvas>
                                </div>
                            </div>
                        </div>  

                        <div class="col-md-4 col-xl-4">

                            <div class="example-wrap">

                                <h4 class="example-title">Hasil</h4>

                                <p>Dari Analis diperoleh bahwa :</p> 
                                <p><b><?= round($persentase_high,2) ?>%</b> level serangan high,</p>
                                <p><b><?= round($persentase_medium,2) ?>%</b> level serangan medium,</p>
                                <p><b><?= round($persentase_low,2) ?>%</b> level serangan low.</p>
                                <form class="col-md-12" action="<?= $aksi ?>?module=rekap&act=insert" method="POST">

                                    <div class="row">

                                    </div>

                                    <div class="row" style="display:none">
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" value="<?php echo $start_date ?>" name="start_date" placeholder="tanggal awal" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="row" style="display:none">
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" value="<?php echo $end_date ?>" name="end_date" placeholder="tanggal awal" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="row" style="display:none">
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" value="<?php echo $start_time ?>" name="start_time" placeholder="waktu awal" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="row" style="display:none">
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" value="<?php echo $end_time ?>" name="end_time" placeholder="waktu akhir" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="row" style="display:none">
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" value="<?= count($x) ?>" name="jumlahalert" placeholder="Jumlah alert" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="row" style="display:none">
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" value="<?= $persentase_high ?>" name="high" placeholder="high" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="row" style="display:none">
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" value="<?= $persentase_medium ?>" name="medium" placeholder="medium" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="row" style="display:none">
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" value="<?= $persentase_low ?>" name="low" placeholder="low" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <button type="submit" class="btn btn-success">Simpan Rekap Harian Clustering K-Means</button>
                                        &nbsp;
                                        <!--<a class="btn btn-danger " href="?module=users" id="batal">Cancel</a>-->
                                    </div>
                                </form>
                            </div>

                        </div>


                    </div>



                </div>
            </div>

        </div>
        
        <?php
}
        ?>
       



        <script src="assets/vendor/babel-external-helpers/babel-external-helpers.js"></script>
        <script src="assets/vendor/jquery/jquery.js"></script>
        <script src="assets/vendor/popper-js/umd/popper.min.js"></script>
        <script src="assets/vendor/bootstrap/bootstrap.js"></script>
        <script src="assets/vendor/animsition/animsition.js"></script>
        <script src="assets/vendor/mousewheel/jquery.mousewheel.js"></script>
        <script src="assets/vendor/asscrollbar/jquery-asScrollbar.js"></script>
        <script src="assets/vendor/asscrollable/jquery-asScrollable.js"></script>

        <!-- Plugins -->
        <script src="assets/vendor/switchery/switchery.js"></script>
        <script src="assets/vendor/intro-js/intro.js"></script>
        <script src="assets/vendor/screenfull/screenfull.js"></script>
        <script src="assets/vendor/slidepanel/jquery-slidePanel.js"></script>
        <script src="assets/vendor/chart-js/Chart.js"></script>


        <!-- Scripts -->
        <script src="assets/js/Component.js"></script>
        <script src="assets/js/Plugin.js"></script>
        <script src="assets/js/Base.js"></script>
        <script src="assets/js/Config.js"></script>

        <!-- Config -->
        <script src="assets/js/config/colors.js"></script>
        <script src="assets/js/config/tour.js"></script>
        <script>
            (function () {
                var pieData = {
                    labels: ["High", "Medium", "Low"],
                    datasets: [{
                            data: [<?= $cluster[3][1] ?>, <?= $cluster[3][2] ?>, <?= $cluster[3][3] ?>],
                            backgroundColor: [Config.colors("red", 400), Config.colors("yellow", 400), Config.colors("green", 400)],
                            hoverBackgroundColor: [Config.colors("red", 600), Config.colors("yellow", 600), Config.colors("green", 600)]
                        }]
                };

                var myPie = new Chart(document.getElementById("exampleChartjsPie").getContext("2d"), {
                    type: 'pie',
                    data: pieData,
                    options: {
                        responsive: true
                    }
                });
            })();

        </script>
        <?php
        break;
}

