<!DOCTYPE html>
<html>
<head>
  <title><?=$title?></title>
  <style>
  table{
      border-collapse: collapse;
      width: 100%;
      margin: 0 auto;
  }
  table th{
      border:1px solid #000;
      padding: 3px;
      font-weight: bold;
      text-align: center;
  }
  table td{
      border:0px solid #000;
      padding: 3px;
      vertical-align: top;
  }

      .tebal{
        font-weight: bold;
      }
      .miring{
        font-style: italic;
      }

       .under { text-decoration: underline; }
   
.satu {
   font-size: 24px; font-weight: bold; line-height: 0.2
   }
   .dua {
   font-weight: bold;  font-size: 20px; line-height: 0.2
   }
   .tiga {
   font-size: 18px; line-height: 0.5
   }
   .empat {
     text-decoration: underline; 
   font-weight: bold;  font-size: 16px; line-height: 0.2
  
   }

.lima {
   font-weight: bold;  font-size: 16px; line-height: 1
  
   }
 .enam {
   font-weight: bold;  font-size: 16px; line-height: 1
  
   }
 .tuju {
   font-weight: bold;  font-size: 16px; line-height: 0
  
   }
.border {
        border-color: #000;
        border-style: solid;

        border-top-width: 4px;
        border-bottom-width: 1px;
        border-left-width: 1px;
        border-right-width: 1px;
        font-weight: bold;  font-size: 16px; line-height: 0.1px
    }
  .bg {
  background-image: url("logo/images/logo.png");
  background-repeat: no-repeat;
  background-color: white;
  padding-right: 0px ; 
  background-size: 20%;
  background-position-y: 20%;
  background-attachment: fixed;
  font-size: 24px;  line-height: 1.5
}

  </style>
</head>
<body onload="window.print();">


  <center><p class="bg"> <font size="18"> <b> &nbsp;PEMERINTAH PROVINSI BENGKULU</b> </font> <br/>
   <font size="14"> <b>&nbsp; DINAS KOMUNIKASI,INFORMATIKA DAN STATISTIK </b><br/> </font>
 Jl.Basuki Rahmad No.6 Kota Bengkulu <br/>
  <font size="14"> <b>BENGKULU</b> </font>  </p></center> 
  <div>
<hr class="border">
</div>
  <center><p class="lima"> <u>SURAT PERINTAH TUGAS</u> <br/> NOMOR : 090/   &nbsp; &nbsp;  /DKS</p></center>
  
 
<br/>
<br/>
<br/>

<table>

<tr>
  <td>
    Dasar
  </td>
  <td>
    <?php echo $all[0]['dasar']?>
  </td>
</tr>

<tr><td></td></tr>
<tr><td></td></tr>
 <?php $no=0;  foreach($all as $row): $no++; ?>

    <tr>  
    <td>&nbsp;</td>
    <td><?php echo $no."."; ?>Nama</td>
    <td>:</td>
    <td><?php echo $row['nama'];?></td> 
    </tr>
    <tr>
 
   <td>&nbsp;</td>
    <td> &nbsp;&nbsp;NIP</td>
    <td>:</td>
    <td><?php echo $row['NIP']; ?></td>
     
    </tr>

    <tr>
 
    <td>&nbsp;</td>

    <Td>&nbsp;Jabatan</Td>
    <td>:</td>
     <td><?php if($row['jabatan']=='fu'){
      echo "fungsional umum";
      } elseif ($row['jabatan']=='kb') {
        echo "kepala bidang";
      } ; ?></td>
    </tr>

   <tr> 


 <td>&nbsp;</td>

   <td>&nbsp;Pangkat/golongan</td>
   <td>:</td>
    <td><?php echo $row['pangkat'].'/'.$row['gol']; ?></td>
    <td></td>
   </tr>

<TR><TD></TD></TR>
   
              
    <?php endforeach; ?>


<tr>
  <td>
    Untuk
  </td>
  <td>
    <?php echo $all[0]['untuk']?>
  </td>
</tr>

    <tr>
  <td>
    Waktu
  </td>
  <td>
    <?php echo $all[0]['waktu']?>
  </td>
</tr>

<tr>
  <td>
    Dana
  </td>
  <td>
    <?php echo $all[0]['dana']?>
  </td>
</tr>

<TR>
  <TD></TD>
</TR>
<tr>
  <td> </td>
  <td></td>
  <td></td>
  <td>
    DITETAPKAN DI : BENGKULU <BR/><U>PADA TANGGAL : 12 April 2016 </U>
    <br/> <P class="enam">KEPALA DINAS KOMUNIKASI, <BR/> INFORMATIKA DAN STATISTIK<BR/> PROVINSI BENGKULU</P>
    <br/><br/><br/>
    <p class="tuju"><U><?php echo $all[0]['dana']  ?></U>
    <P><BR> Pembina Utama Muda <br/> NIP.1987778778</p>


  </td>
</tr>

</table>
<BR>

<br/>
</body>
</html>