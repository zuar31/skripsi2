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
                        <th>IP Source</th>
                        <th>IP Destination</th>
                        <th>Signature Name</th>
                        <th>Port Destination</th>
                        <th>Jumlah Alert</th>
                        <th>Layer Protokol</th>
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
                            . " FROM view_acid_event "
                            . " Group by sig_name, ip_src "
                            . " Order by MIN(timestamp)");
                    $no = 1;
                    while ($r = mysqli_fetch_array($tampil)) {

                        $date = new DateTime($r['first']);
                        $date2 = new DateTime($r['last']);
                        $diff = $date2->getTimestamp() - $date->getTimestamp();
                        ?>   
                        <!-- Proses tampil data training -->
                        <tr>
                            <td><?= $no++?></td>
                            <td><?= long2ip($r['ip_src']) ?></td>
                            <td><?= long2ip($r['ip_dst']) ?></td>
                            <td><?= $r['sig'] ?></td>
                            <td><?= $r['layer4_dport'] ?></td>
                            <td><?= $r['jumlahalert'] ?></td>
                            <td><?= getprotobynumber($r['ip_proto']) ?></td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>          
                </tbody>
            </table>
        </div>
    </div>  
    <div>  

            <div class="panel">
                
                <div class="page-content">
                    <!-- Panel line css animation Chart -->

                    <!-- Panel Bar -->
                    <div class="panel">
                        
                        <div class="panel-body">
                            <div class="row col-lg">

                                <div class="col-lg-12">
                                    <!-- Example Horizontal Bar -->
                                    <div class="example-wrap m-md-0">
                                        <h4 class="example-title">Horizontal Bar Chart</h4>
                                        <div class="example">
                                            <div class="ct-chart" id="exampleHorizontalBar"></div>
                                        </div>
                                    </div>
                                    <!-- End Example Horizontal Bar -->
                                </div>

                            </div>
                            <div class="row col-lg">

                                <div class="col-lg-12">
                                    <!-- Example Horizontal Bar -->
                                    <div class="example-wrap m-md-0">
                                        <h4 class="example-title">Horizontal Bar Chart</h4>
                                        <div class="example">
                                            <div class="ct-chart" id="exampleHorizontalBar1"></div>
                                        </div>
                                    </div>
                                    <!-- End Example Horizontal Bar -->
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End Panel Bar -->


                </div>   
            </div>
            <?php
            $tampil = mysqli_query($koneksi, "SELECT *,COUNT(sig_name) as jumlah_alert FROM `view_acid_event`group by sig_name order by jumlah_alert asc");
            $t = 1;
            $label = array();
            $y = array();

            while ($r = mysqli_fetch_array($tampil)) {
//                var_dump($r);
//                die;
                array_push($label, $r['sig_name']);
//                array_push($label1, long2ip($r['ip_src']));
                array_push($y, $r['jumlah_alert']);
                $t++;
            }
            
            $tampil1 = mysqli_query($koneksi, "SELECT *,COUNT(ip_src) as jumlah_alert FROM `view_acid_event`group by ip_src order by jumlah_alert asc");
            $t1 = 1;
            $label1 = array();
            $y1 = array();

            while ($r = mysqli_fetch_array($tampil1)) {
//                var_dump($r);
//                die;
//                array_push($label, $r['sig_name']);
                array_push($label1, long2ip($r['ip_src']));
                array_push($y1, $r['jumlah_alert']);
                $t1++;
            }
            ?>
        </div>
    </div>
    <!-- End Page -->

<!-- End Panel Basic -->

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



<!-- Scripts -->
<script src="assets/js/Component.js"></script>
<script src="assets/js/Plugin.js"></script>
<script src="assets/js/Base.js"></script>
<script src="assets/js/Config.js"></script>

<!-- Config -->
<script src="assets/js/config/colors.js"></script>
<script src="assets/js/config/tour.js"></script>



<script src="assets/vendor/chartist/chartist.js"></script>
<script src="assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.js"></script>

       <!--<script src="assets/examples/js/charts/chartist.js"></script>-->
<script>

    (function (global, factory) {
        if (typeof define === "function" && define.amd) {
            define('/charts/chartist', ['jquery', 'Site'], factory);
        } else if (typeof exports !== "undefined") {
            factory(require('jquery'), require('Site'));
        } else {
            var mod = {
                exports: {}
            };
            factory(global.jQuery, global.Site);
            global.chartsChartist = mod.exports;
        }
    })(this, function (_jquery, _Site) {
        'use strict';

        var _jquery2 = babelHelpers.interopRequireDefault(_jquery);

        (0, _jquery2.default)(document).ready(function ($$$1) {
            (0, _Site.run)();
        });

        // Example Chartist Horizontal Bar
        // -------------------------------
        (function () {
            new Chartist.Bar('#exampleHorizontalBar', {
                labels: <?= json_encode($label) ?>,
                series: [<?= json_encode($y) ?>]
            }, {
                seriesBarDistance: 10,
                reverseData: false,
                horizontalBars: true,
                axisY: {
                    offset: 90
                }
            });
        })();
        
        (function () {
            new Chartist.Bar('#exampleHorizontalBar1', {
                labels: <?= json_encode($label1) ?>,
                series: [<?= json_encode($y1) ?>]
            }, {
                seriesBarDistance: 10,
                reverseData: false,
                horizontalBars: true,
                axisY: {
                    offset: 90
                }
            });
        })();


    });
</script>