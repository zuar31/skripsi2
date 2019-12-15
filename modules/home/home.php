
      <div class="page">
      <div class="page-header">
        <h1 class="page-title">Flot Charts</h1>
      </a>
        </div>
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
                                        <th>First Time</th>
                                        <th>End Time</th>
                                        <th>Durasi(s)</th>
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
                                            <td><?= $r['first'] ?></td>
                                            <td><?= $r['last'] ?></td>
                                            <td><?= $diff?></td>
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
     <!-- Page -->
    <div class="page">
      <div class="page-header">
        <h1 class="page-title">Flot Charts</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:void(0)">Charts</a></li>
          <li class="breadcrumb-item active">Flot</li>
        </ol>
        <div class="page-header-actions">
          <a class="btn btn-sm btn-default btn-outline btn-round" href="http://www.flotcharts.org"
            target="_blank">
        <i class="icon wb-link" aria-hidden="true"></i>
        <span class="hidden-sm-down">Official Website</span>
      </a>
        </div>
      </div>

      <div class="page-content">
        <!-- Panel -->
        <div class="panel">
          <div class="panel-body container-fluid">
            <div class="row row-lg">
              <div class="col-lg-6">
                <!-- Example Realtime -->
                <div class="example-wrap">
                  <h4 class="example-title">Realtime</h4>
                  <div class="example">
                    <div id="exampleFlotRealtime"></div>
                  </div>
                </div>
                <!-- End Example Realtime -->
              </div>

              <div class="col-lg-6">
                <!-- Example Full-Bg Line -->
                <div class="example-wrap">
                  <h4 class="example-title">Full-Bg Line</h4>
                  <div class="example example-responsive">
                    <div class="w-xs-400" id="exampleFlotFullBg"></div>
                  </div>
                </div>
                <!-- End Example Full-Bg Line -->
              </div>

              <div class="col-lg-6">
                <!-- Example Curve -->
                <div class="example-wrap m-md-0">
                  <h4 class="example-title">Curve</h4>
                  <div class="example example-responsive">
                    <div class="w-xs-400" id="exampleFlotCurve"></div>
                  </div>
                </div>
                <!-- End Example Curve -->
              </div>

              <div class="col-lg-6">
                <!-- Example Mix -->
                <div class="example-wrap">
                  <h4 class="example-title">Mix</h4>
                  <div class="example example-responsive">
                    <div class="w-xs-400" id="exampleFlotMix"></div>
                  </div>
                </div>
                <!-- End Example Mix -->
              </div>
            </div>
          </div>
        </div>
        <!-- End Panel -->

        <div class="panel">
          <div class="panel-body container-fluid">
            <div class="row row-lg">
              <div class="col-xl-6">
                <!-- Example Stack Bar -->
                <div class="example-wrap m-lg-0">
                  <h4 class="example-title">Stack Bar</h4>
                  <div class="example">
                    <div id="exampleFlotStackBar"></div>
                  </div>
                </div>
                <!-- End Example Stack Bar -->
              </div>

              <div class="col-xl-6">
                <!-- Example Horizontal Bar -->
                <div class="example-wrap">
                  <h4 class="example-title">Horizontal Bar</h4>
                  <div class="example">
                    <div id="exampleFlotHorizontalBar"></div>
                  </div>
                </div>
                <!-- End Example Horizontal Bar -->
              </div>
            </div>
          </div>
        </div>

        


      </div>
    </div>
    <!-- End Page -->
              </div>
        </div>
        <!-- End Panel Basic -->
   