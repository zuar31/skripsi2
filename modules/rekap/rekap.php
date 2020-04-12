<?php
$act = $_GET['act'];
date_default_timezone_set('Asia/Jakarta');
switch($act)
{
    case 'insert':
    session_start();
    include "../../config/koneksi.php";

    $start_date=date('Y-m-d',strtotime($_POST['start_date']));
    $end_date=date('Y-m-d',strtotime($_POST['end_date']));
    $start_time=$_POST['start_time'];
    $end_time=$_POST['end_time'];
    $jumlahalert=$_POST['jumlahalert'];
    $high=$_POST['high'];
    $medium=$_POST['medium'];
    $low =$_POST['low'];
    
    $datetime_awal=date('Y-m-d H:i:s',strtotime(''.$start_date.' '.$start_time.''));
    $datetime_akhir=date('Y-m-d H:i:s',strtotime(''.$end_date.' '.$end_time.''));
    
    $cek_data_exists_today=mysqli_query($koneksi,"select * from rekap_idskmeans where DATE(periode_awal)='$start_date' ");
//    print_r(mysqli_fetch_array($cek_data_exists_today));
    if(mysqli_fetch_array($cek_data_exists_today)>0)
    {
    $cek_data_exists_today=mysqli_query($koneksi,"select * from rekap_idskmeans where DATE(periode_awal)='$start_date' ");
    $r=mysqli_fetch_array($cek_data_exists_today);
//    var_dump($start_date);
    $insert_to_db=mysqli_query($koneksi,"update rekap_idskmeans set periode_awal='$datetime_awal',periode_akhir='$datetime_akhir',jumlah_alert='$jumlahalert',high='$high',medium='$medium',low='$low' where id='".$r['id']."'");    
    }
    else
    {
    $insert_to_db=mysqli_query($koneksi,"INSERT INTO rekap_idskmeans(periode_awal,periode_akhir,jumlah_alert,high,medium,low) VALUES('$datetime_awal','$datetime_akhir','$jumlahalert','$high','$medium','$low')");    
    }
    
    if($insert_to_db==true)
    {
    header('location:../../module.php?module=clustering_kmeans');    
    }
    
    
    break;
    default:
?>
<div class="page">
                <div class="page-header">
                    <h1 class="page-title">Table Periode Rekap </h1>               
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
                                        <th>Periode Awal </th>
                                        <th>Periode Akhir</th>
                                        <th>Jumlah Alert</th>
                                        <th>High</th>
                                        <th>Medium</th>
                                        <th>Low</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $data=mysqli_query($koneksi,'SELECT * FROM rekap_idskmeans');
//                                    var_dump($data);
                                    $no=1;
                                    ?>
                                  <!-- Proses tampil data rekap -->
                                  <?php while($r=mysqli_fetch_array($data)){?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= ($r['periode_awal']) ?></td>
                                            <td><?= $r['periode_akhir'] ?></td>
                                            <td><?= $r['jumlah_alert'] ?></td>
                                            <td><?= round($r['high'],2) ?></td>
                                            <td><?= round($r['medium'],2) ?></td> 
                                            <td><?= round($r['low'],2)?></td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href='?module=clustering_kmeans&start_date=<?php echo date('m/d/Y H:i:s',strtotime($r['periode_awal'])) ?>&end_date=<?php echo date('m/d/Y H:i:s',strtotime($r['periode_akhir'])) ?>'><i class="icon glyphicon glyphicon-edit" aria-hidden="true"></i> Detail</a> &nbsp&nbsp</td> 
                                                
                                         
                                        </tr>
                                       
                                  <?php  $no++; }?>
                                       
                                </tbody>
                            </table>
                            
<?php
}
?>