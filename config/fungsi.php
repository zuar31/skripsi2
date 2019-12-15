<?php
function terlambat($tgl_dateline, $tgl_kembali) {

$tgl_dateline_pcs = explode ("-", $tgl_dateline);
$tgl_dateline_pcs = $tgl_dateline_pcs[2]."-".$tgl_dateline_pcs[1]."-".$tgl_dateline_pcs[0];

$tgl_kembali_pcs = explode ("-", $tgl_kembali);
$tgl_kembali_pcs = $tgl_kembali_pcs[2]."-".$tgl_kembali_pcs[1]."-".$tgl_kembali_pcs[0];

$selisih = strtotime ($tgl_kembali_pcs) - strtotime ($tgl_dateline_pcs);

$selisih = $selisih / 86400;

if ($selisih>=1) {
	$hasil_tgl = floor($selisih);
}
else {
	$hasil_tgl = 0;
}
return $hasil_tgl;
}

function lama_bergabung($tgl_daftar,$tgl_sekarang) {
	
	$timeStart = strtotime($tgl_daftar);
	$timeEnd = strtotime($tgl_sekarang);
	

	// Menambah bulan ini + semua bulan pada tahun sebelumnya
	$numBulan = 1 + (date("Y",$timeEnd)-date("Y",$timeStart))*12;
// menghitung selisih bulan
	$numBulan += date("m",$timeEnd)-date("m",$timeStart);

	$tanggalStart = date('d',$timeStart)+0;
	$tanggalEnd = date('d',$timeEnd)+0;

	if($tanggalStart < $tanggalEnd){
	$numBulan = $numBulan - 1;
	}

	return $numBulan;

}

function get_premi($id,$no, $total_premi) {
	$tampil=mysql_query("SELECT * FROM premi,user WHERE premi.id_user=user.id_user AND user.id_user='$id' ORDER BY id_premi DESC");
	$html = "";
	
    while ($r=mysql_fetch_array($tampil)){
		
	$premi=format_rupiah($r[jumlah]);
	$tanggal=tgl_indo($r[tanggal]);
       $html .= "<tr><td>$no</td>
             <td>$r[id_user]</td>
			 <td>$r[nama_lengkap]</td>
			 <td>Rp. $premi</td>
			 <td>$tanggal - $r[jam] WIB</td>
             <td><a href=?module=premi&act=editpremi&id=$r[id_premi] class='btn btn-primary btn-sm' title='Edit'><i class='fa fa-edit'></i></a>
	               <a href=$aksi?module=premi&act=hapus&id=$r[id_premi] class='btn btn-danger btn-sm' title='Hapus' onClick=\"return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini ?')\"><i class='fa fa-trash'></i></a>
             </td></tr>";
	  $total_premi += $r[jumlah];
	 
	
      $no++;
    }
	
	$data['table'] = $html;
	$data['no'] = $no;
	$data['total_premi'] = $total_premi;


	return $data;
}

function get_premi2($id,$no, $total_premi) {
	$tampil=mysql_query("SELECT * FROM premi,user WHERE premi.id_user=user.id_user AND user.id_user='$id' ORDER BY id_premi DESC");
	$html = "";
	
    while ($r=mysql_fetch_array($tampil)){
		
	$premi=format_rupiah($r[jumlah]);
	$tanggal=tgl_indo($r[tanggal]);
       $html .= "<tr><td>$no</td>
             <td>$r[id_user]</td>
			 <td>$r[nama_lengkap]</td>
			 <td>Rp. $premi</td>
			 <td>$tanggal - $r[jam] WIB</td>
             </tr>";
	  $total_premi += $r[jumlah];
	 
	
      $no++;
    }
	
	$data['table'] = $html;
	$data['no'] = $no;
	$data['total_premi'] = $total_premi;


	return $data;
}
?>