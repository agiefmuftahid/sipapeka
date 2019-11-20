<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distribusi extends CI_Controller {
    function __construct(){
        parent::__construct();
        $status = $this->session->userdata('login');
        if($status != 'login'){
            redirect('User');
        }
    }
    public function ajax_list_transaksi()
    {

        $data = array();
        $no = 1; 
        
        foreach ($this->cart->contents() as $items){
            
            $row = array();
            $row[] = $no;
            $row[] = $items["noBukti"];
            $row[] = $items["pegawai"];
            $row[] = $items["admin"];
            $row[] = $items["tgl_keluar"];
            $row[] = $items["id"];
            $row[] = $items["name"];
            $row[] = 'Rp. ' . number_format( $items['price'], 
                    0 , '' , '.' ) . ',-';
            $row[] = $items["qty"];
            $row[] = 'Rp. ' . number_format( $items['subtotal'], 
                    0 , '' , '.' ) . ',-';

            //add html for action
            $row[] = '<a class="btn btn-danger"
                href="javascript:void()" style="color:rgb(255,255,255);
                text-decoration:none" onclick="deletebarang('
                    ."'".$items["rowid"]."'".','."'".$items['subtotal'].
                    "'".')"> <i class="fa fa-close"></i></a><input name="no_bukti[]" value='.$items["noBukti"].' class="form-control" readonly type="hidden"><input name="kode_barang[]" value='.$items["id"].' class="form-control" readonly type="hidden"><input name="jlh[]" value='.$items["qty"].' class="form-control" readonly type="hidden"><input name="pegawai[]" value='.$items["pegawai"].' class="form-control" readonly type="hidden"><input name="admin[]" value='.$items["admin"].' class="form-control" readonly type="hidden"><input name="tgl_keluar[]" value='.$items["tgl_keluar"].' class="form-control" readonly type="hidden"><input name="total[]" value='.$items["subtotal"].' class="form-control" readonly type="hidden">';
        
            $data[] = $row;
            $no++;

        }

        $output = array(
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    public function addbarang()
    {
        $NIP_pegawai = $this->Madmin->getWhere('tb_pegawai',array('namaPegawai' => $this->input->post('admin')))->row()->NIP_pegawai;
        $NIP_user = $NIP_pegawai;
        $data = array(
                'noBukti' => $this->input->post('noBukti1').'.'.$this->input->post('noBukti2').'.'.$this->input->post('noBukti3').'.'.$this->input->post('noBukti4'),
                'pegawai' => $this->input->post('pegawai'),
                'admin' => $NIP_user,
                'tgl_keluar' => $this->input->post('tgl_keluar'),
                'id' => $this->input->post('id_barang'),
                'name' => $this->input->post('nama_barang'),
                'price' => str_replace('.', '', $this->input->post(
                    'harga_barang')),
                'qty' => $this->input->post('qty')
            );
        $insert = $this->cart->insert($data);
        echo json_encode(array("status" => TRUE));
    }
    public function deletebarang($rowid) 
    {

        $this->cart->update(array(
                'rowid'=>$rowid,
                'qty'=>0,));
        echo json_encode(array("status" => TRUE));
    }
    //DISTRIBUSI
    public function formDistribusi()
    {   
        $filter = $this->input->post('button');
        $field  = $this->input->post('field');
        $search = $this->input->post('search');
        $tampil = $this->input->post('tampil');
        $tgl1 = $this->input->post('tgl1');
        $tgl2 = $this->input->post('tgl2');

        if (isset($filter) && !empty($search)) {
            $data['data'] = $this->Madmin->getJoinGroupLike('tb_kwitansi','tb_barang','tb_pegawai','tb_bidang','*,tb_kwitansi.jumlah as jumlahKeluar','tb_barang.kodeBarang = tb_kwitansi.kodeBarang','tb_pegawai.NIP_pegawai = tb_kwitansi.NIP_pegawai','tb_bidang.idBidang = tb_pegawai.idBidang',$field,$search)->result_array();
            $data['data2'] = $this->Madmin->getJoinGroupLike('tb_kwitansi','tb_barang','tb_pegawai','tb_bidang','*,tb_kwitansi.jumlah as jumlahKeluar','tb_barang.kodeBarang = tb_kwitansi.kodeBarang','tb_pegawai.NIP_pegawai = tb_kwitansi.NIP_pegawai','tb_bidang.idBidang = tb_pegawai.idBidang',$field,$search)->result_array();
            $data['barang'] = $this->Madmin->lihat('tb_barang')->result_array();
            $data['pegawai'] = $this->Madmin->lihat('tb_pegawai')->result_array();
            $data['bidang'] = $this->Madmin->lihat('tb_bidang')->result_array();
            $this->load->view('distribusi',$data);
        } else if(isset($filter) && !empty($tgl1))  {
            $data['data'] = $this->Madmin->getJoinGroupDate('tb_kwitansi','tb_barang','tb_pegawai','tb_bidang','*,tb_kwitansi.jumlah as jumlahKeluar','tb_barang.kodeBarang = tb_kwitansi.kodeBarang','tb_pegawai.NIP_pegawai = tb_kwitansi.NIP_pegawai','tb_bidang.idBidang = tb_pegawai.idBidang',$tgl1,$tgl2)->result_array();
            $data['data2'] = $this->Madmin->getJoinGroupDate('tb_kwitansi','tb_barang','tb_pegawai','tb_bidang','*,tb_kwitansi.jumlah as jumlahKeluar','tb_barang.kodeBarang = tb_kwitansi.kodeBarang','tb_pegawai.NIP_pegawai = tb_kwitansi.NIP_pegawai','tb_bidang.idBidang = tb_pegawai.idBidang',$tgl1,$tgl2)->result_array();
            $data['barang'] = $this->Madmin->lihat('tb_barang')->result_array();
            $data['pegawai'] = $this->Madmin->lihat('tb_pegawai')->result_array();
            $data['bidang'] = $this->Madmin->lihat('tb_bidang')->result_array();
            $this->load->view('distribusi',$data);
        } else if(isset($tampil)) {
            $data['data'] = $this->Madmin->getJoin4Group('tb_kwitansi','tb_barang','tb_pegawai','tb_bidang','*,tb_kwitansi.jumlah as jumlahKeluar','tb_barang.kodeBarang = tb_kwitansi.kodeBarang','tb_pegawai.NIP_pegawai = tb_kwitansi.NIP_pegawai','tb_bidang.idBidang = tb_pegawai.idBidang')->result_array();
            $data['data2'] = $this->Madmin->getJoin4Group('tb_kwitansi','tb_barang','tb_pegawai','tb_bidang','*,tb_kwitansi.jumlah as jumlahKeluar','tb_barang.kodeBarang = tb_kwitansi.kodeBarang','tb_pegawai.NIP_pegawai = tb_kwitansi.NIP_pegawai','tb_bidang.idBidang = tb_pegawai.idBidang')->result_array();
            $data['barang'] = $this->Madmin->lihat('tb_barang')->result_array();
            $data['pegawai'] = $this->Madmin->lihat('tb_pegawai')->result_array();
            $data['bidang'] = $this->Madmin->lihat('tb_bidang')->result_array();
            $this->load->view('distribusi',$data);
        } 
        else {
            $data['data'] = $this->Madmin->getJoin4Group('tb_kwitansi','tb_barang','tb_pegawai','tb_bidang','*,tb_kwitansi.jumlah as jumlahKeluar','tb_barang.kodeBarang = tb_kwitansi.kodeBarang','tb_pegawai.NIP_pegawai = tb_kwitansi.NIP_pegawai','tb_bidang.idBidang = tb_pegawai.idBidang')->result_array();
            $data['data2'] = $this->Madmin->getJoin4Group('tb_kwitansi','tb_barang','tb_pegawai','tb_bidang','*,tb_kwitansi.jumlah as jumlahKeluar','tb_barang.kodeBarang = tb_kwitansi.kodeBarang','tb_pegawai.NIP_pegawai = tb_kwitansi.NIP_pegawai','tb_bidang.idBidang = tb_pegawai.idBidang')->result_array();
            $data['barang'] = $this->Madmin->lihat('tb_barang')->result_array();
            $data['pegawai'] = $this->Madmin->lihat('tb_pegawai')->result_array();
            $data['bidang'] = $this->Madmin->lihat('tb_bidang')->result_array();
            $this->load->view('distribusi',$data);
        }
    }
    public function tambahDistribusi(){
        $kd = $_POST['kode_barang'];
        $no = $_POST['no_bukti'];
        $jlh = $_POST['jlh'];
        $adm = $_POST['admin'];
        $peg = $_POST['pegawai'];
        $tgl = $_POST['tgl_keluar'];
        $tot = $_POST['total'];
        $x=0;
        foreach ($kd as $key){
            $noBukti['noBukti'] = $no[$x];
            $kodeBarang['kodeBarang'] = $kd[$x];
            $jumlah['jumlah'] = $jlh[$x];
            $NIP_pegawai['NIP_pegawai'] = $peg[$x];
            $tglDistribusi['tglDistribusi'] = $tgl[$x];
            $hargaTotal['hargaTotal'] = $tot[$x];
            $jumlahBarang = $this->Madmin->getWhere('tb_barang',$kodeBarang)->row()->jumlah;
            $namaBarang = $this->Madmin->getWhere('tb_barang',$kodeBarang)->row()->namaBarang;
            $jumlahDistribusi = $jlh[$x];
            $hargaBarang = $this->Madmin->getWhere('tb_barang',$kodeBarang)->row()->hargaSatuan;
            $jatahKurang = $jumlahDistribusi*$hargaBarang;
            $bidang = $this->Madmin->getWhere('tb_pegawai',$NIP_pegawai)->row()->idBidang;
            $idBidang['idBidang'] = $bidang;
            $jatah = $this->Madmin->getWhere('tb_bidang',$idBidang)->row()->jatah;
            $jatahSisa = $jatah-$jatahKurang;
            if($jumlahDistribusi > $jumlahBarang){
                $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Jumlah Berlebih Dari Stok<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Distribusi/formDistribusi');
            }elseif($jatah < $jatahKurang){
                $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Jatah Melebihi <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Distribusi/formDistribusi');
            }elseif($jatahSisa < 0){
                $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Jatah Sudah Habis <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Distribusi/formDistribusi');
            }else{
                if($x==0){
                    $data4 = array(
                        'noBukti'    => $no[0],
                        'tglKeluar'    => $tgl[0]
                    );
                    $this->Madmin->tambah('tb_distribusi',$data4);
                }
                $data = array(
                    'noBukti'    => $no[$x],
                    'kodeBarang'    => $kd[$x],
                    'jumlah'    => $jlh[$x],
                    'NIP_pegawai'    => $peg[$x],
                    'NIP_user'    => $adm[$x],
                    'tglDistribusi'    => $tgl[$x],
                    'hargaTotal'    => $tot[$x]
                );
                $this->Madmin->tambah('tb_kwitansi',$data);
                $data2['jumlah'] = $jumlahBarang-$jumlahDistribusi;
                $this->Madmin->ubah('tb_barang',$data2,$kodeBarang);
                $data3['jatah'] = $jatahSisa;
                $this->Madmin->ubah('tb_bidang',$data3,$idBidang);
            };
            $x++;
        };
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Tambah Data Berhasil <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Distribusi/formDistribusi');
    }
    public function ubahDistribusi(){
        $brg = $_POST['kodeBarang'];
        $id = $_POST['idDistribusi'];
        $jlh = $_POST['jumlah'];
        $jlh2 = $_POST['jumlahLama'];
        $bukti = $this->input->post('noBukti');
        $x=0;
        $dta = $this->Madmin->getJoinGroupWhere3UbahDistribusi('tb_kwitansi','tb_barang','tb_pegawai','tb_bidang','*,tb_kwitansi.jumlah as jumlahKeluar','tb_barang.kodeBarang = tb_kwitansi.kodeBarang','tb_pegawai.NIP_pegawai = tb_kwitansi.NIP_pegawai','tb_bidang.idBidang = tb_pegawai.idBidang','noBukti',$bukti)->result_array();
        $perbandingan1 = count($dta);
        $perbandingan2 = count($brg);
        if($perbandingan1>$perbandingan2){
            foreach ($dta as $key) {
                if(!empty($brg[$x])){
                    $idDistribusi['idDistribusi'] = $id[$x];
                    $noBukti['noBukti'] = $this->input->post('noBukti');
                    $kodeBarang['kodeBarang'] = $brg[$x];
                    $jumlahbarangLama = $this->Madmin->getWhere('tb_barang',$kodeBarang)->row()->jumlah;
                    $namaPegawai['namaPegawai'] = $this->input->post('namaPegawai');
                    $nip = $this->Madmin->getWhere('tb_pegawai',$namaPegawai)->row()->NIP_pegawai;
                    $NIP_pegawai['NIP_pegawai'] = $this->Madmin->getWhere('tb_pegawai',$namaPegawai)->row()->NIP_pegawai;
                    $bidang['idBidang'] = $this->Madmin->getWhere('tb_pegawai',$NIP_pegawai)->row()->idBidang;
                    $jatah = $this->Madmin->getWhere('tb_bidang',$bidang)->row()->jatah;
                    $hargaBarang = $this->Madmin->getWhere('tb_barang',$kodeBarang)->row()->hargaSatuan;
                    $total = $this->Madmin->getWhere('tb_kwitansi',$noBukti)->row()->hargaTotal;
                    $hargaLama = $jlh2[$x]*$hargaBarang;
                    $hargaBaru = $jlh[$x]*$hargaBarang;
                    $jatahSisa = $jatah+($hargaLama-$hargaBaru);
                    $data = array(
                        'kodeBarang'    => $brg[$x],
                        'jumlah'    => $jlh[$x],
                        'noBukti'    => $this->input->post('nmrBukti'),
                        'tglDistribusi'    => $this->input->post('tglDistribusi'),
                        'NIP_pegawai'    => $nip,
                        'NIP_user'    => $this->input->post('NIP_user'),
                        'hargaTotal'    => $hargaBaru
                    );
                    $data2 = array(
                        'jumlah'    => $jumlahbarangLama+($jlh2[$x]-$jlh[$x])
                    );
                    $data3['jatah'] = $jatahSisa;
                    $data4 = array(
                        'noBukti'    => $this->input->post('nmrBukti'),
                        'tglKeluar'    => $this->input->post('tglDistribusi')
                    );
                    $this->Madmin->ubah('tb_distribusi',$data4,$noBukti);
                    $this->Madmin->ubah('tb_kwitansi',$data,$idDistribusi);
                    $this->Madmin->ubah('tb_barang',$data2,$kodeBarang);
                    $this->Madmin->ubah('tb_bidang',$data3,$bidang);
                }else{
                    $jumlahkurang = $this->Madmin->getWhere('tb_kwitansi',array('idDistribusi' => $dta[$x]['idDistribusi']))->row()->jumlah;
                    $totalkurang = $this->Madmin->getWhere('tb_kwitansi',array('idDistribusi' => $dta[$x]['idDistribusi']))->row()->hargaTotal;
                    $kodekurang = $this->Madmin->getWhere('tb_barang',array('kodeBarang' => $dta[$x]['kodeBarang']))->row()->kodeBarang;
                    $jumlahbarang = $this->Madmin->getwhere('tb_barang',array('kodeBarang' => $dta[$x]['kodeBarang']))->row()->jumlah;
                    $namaPegawai['namaPegawai'] = $this->input->post('namaPegawai');
                    $NIP_pegawai['NIP_pegawai'] = $this->Madmin->getWhere('tb_pegawai',$namaPegawai)->row()->NIP_pegawai;
                    $bidang['idBidang'] = $this->Madmin->getWhere('tb_pegawai',$NIP_pegawai)->row()->idBidang;
                    $jatah = $this->Madmin->getWhere('tb_bidang',$bidang)->row()->jatah;
                    $jatahtambah = $jatah+$totalkurang;
                    $data = array(
                        'jumlah' => $jumlahbarang+$jumlahkurang
                    );
                    $data2 = array(
                        'jatah' => $jatahtambah
                    );
                    $this->Madmin->ubah('tb_barang',$data,array('kodeBarang' => $dta[$x]['kodeBarang']));
                    $this->Madmin->ubah('tb_bidang',$data2,$bidang);
                    $this->db->delete('tb_kwitansi',array('idDistribusi' => $dta[$x]['idDistribusi'])); //tambah lagi
                }
                $x++;
            }
        }else{
            foreach ($id as $key) {
                if(!empty($dta[$x])){
                     $idDistribusi['idDistribusi'] = $id[$x];
                    $noBukti['noBukti'] = $this->input->post('noBukti');
                    $kodeBarang['kodeBarang'] = $brg[$x];
                    $kodeBaranglama = $this->Madmin->getWhere('tb_kwitansi',array('idDistribusi' => $dta[$x]['idDistribusi']))->row()->kodeBarang;
                    $jumlahlama = $this->Madmin->getWhere('tb_kwitansi',array('idDistribusi' => $dta[$x]['idDistribusi']))->row()->jumlah;
                    $jumlahbarangLama = $this->Madmin->getWhere('tb_barang',$kodeBarang)->row()->jumlah;
                    $jumlahbarangLama2 = $this->Madmin->getWhere('tb_barang',array('kodeBarang' => $kodeBaranglama))->row()->jumlah;
                    $hargaBarang = $this->Madmin->getWhere('tb_barang',$kodeBarang)->row()->hargaSatuan;
                    $hargaBaranglama = $this->Madmin->getWhere('tb_barang',array('kodeBarang' => $kodeBaranglama))->row()->hargaSatuan;
                    $namaPegawai['namaPegawai'] = $this->input->post('namaPegawai');
                    $nip = $this->Madmin->getWhere('tb_pegawai',$namaPegawai)->row()->NIP_pegawai;
                    $NIP_pegawai['NIP_pegawai'] = $this->Madmin->getWhere('tb_pegawai',$namaPegawai)->row()->NIP_pegawai;
                    $bidang['idBidang'] = $this->Madmin->getWhere('tb_pegawai',$NIP_pegawai)->row()->idBidang;
                    $jatah = $this->Madmin->getWhere('tb_bidang',$bidang)->row()->jatah;
                    $hargaLama = $jumlahlama*$hargaBarang;
                    $hargaBaru = $jlh[$x]*$hargaBarang;
                    $jatahSisa = $jatah+($hargaLama-$hargaBaru);
                    $jatahsebelum = $jumlahlama*$hargaBaranglama;
                    $data = array(
                        'kodeBarang'    => $brg[$x],
                        'jumlah'    => $jlh[$x],
                        'noBukti'    => $this->input->post('nmrBukti'),
                        'tglDistribusi'    => $this->input->post('tglDistribusi'),
                        'NIP_pegawai'    => $nip,
                        'NIP_user'    => $this->input->post('NIP_user'),
                        'hargaTotal'    => $hargaBaru
                    );
                    $data4 = array(
                        'noBukti'    => $this->input->post('nmrBukti'),
                        'tglKeluar'    => $this->input->post('tglDistribusi')
                    );
                    $this->Madmin->ubah('tb_distribusi',$data4,$noBukti);
                    $this->Madmin->ubah('tb_kwitansi',$data,$idDistribusi);
                    if($brg[$x]==$dta[$x]['kodeBarang']){
                        $data2 = array(
                            'jumlah'    => $jumlahbarangLama+($jumlahlama-$jlh[$x])
                        );
                        $this->Madmin->ubah('tb_barang',$data2,$kodeBarang);
                        $data3['jatah'] = $jatahSisa;
                        $this->Madmin->ubah('tb_bidang',$data3,$bidang);
                    }else{
                        $data2 = array(
                            'jumlah'    => $jumlahbarangLama-$jlh[$x]
                        );
                        $this->Madmin->ubah('tb_barang',$data2,$kodeBarang);
                        $data21 = array(
                            'jumlah'    => $jumlahbarangLama2+$jumlahlama
                        );
                        $this->Madmin->ubah('tb_barang',$data21,array('kodeBarang' => $kodeBaranglama));
                        $data3 = array(
                            'jatah' => $jatah+$jatahsebelum
                        );
                        $this->Madmin->ubah('tb_bidang',$data3,$bidang);
                        $jatahnew = $this->Madmin->getWhere('tb_bidang',$bidang)->row()->jatah;
                        $data5['jatah'] = $jatahnew-$hargaBaru;
                        $this->Madmin->ubah('tb_bidang',$data5,$bidang);
                    }
                }else{
                    $idDistribusi['idDistribusi'] = $id[$x];
                    $noBukti['noBukti'] = $this->input->post('noBukti');
                    $kodeBarang['kodeBarang'] = $brg[$x];
                    $jumlah['jumlah'] = $jlh[$x];
                    $jumlahbarangLama = $this->Madmin->getWhere('tb_barang',$kodeBarang)->row()->jumlah;
                    $namaPegawai['namaPegawai'] = $this->input->post('namaPegawai');
                    $nip = $this->Madmin->getWhere('tb_pegawai',$namaPegawai)->row()->NIP_pegawai;
                    $NIP_pegawai['NIP_pegawai'] = $this->Madmin->getWhere('tb_pegawai',$namaPegawai)->row()->NIP_pegawai;
                    $bidang['idBidang'] = $this->Madmin->getWhere('tb_pegawai',$NIP_pegawai)->row()->idBidang;
                    $jatah = $this->Madmin->getWhere('tb_bidang',$bidang)->row()->jatah;
                    $hargaBarang = $this->Madmin->getWhere('tb_barang',$kodeBarang)->row()->hargaSatuan;
                    $hargaLama = $jlh2[$x]*$hargaBarang;
                    $hargaBaru = $jlh[$x]*$hargaBarang;
                    $jatahSisa = $jatah+($hargaLama-$hargaBaru);
                    $data = array(
                        'kodeBarang'    => $brg[$x],
                        'jumlah'    => $jlh[$x],
                        'noBukti'    => $this->input->post('nmrBukti'),
                        'tglDistribusi'    => $this->input->post('tglDistribusi'),
                        'NIP_pegawai'    => $nip,
                        'NIP_user'    => $this->input->post('NIP_user'),
                        'hargaTotal'    => $hargaBaru
                    );
                    $data2 = array(
                        'jumlah'    => $jumlahbarangLama+($jlh2[$x]-$jlh[$x])
                    );
                    $data3['jatah'] = $jatahSisa;
                    $data4 = array(
                        'noBukti'    => $this->input->post('nmrBukti'),
                        'tglKeluar'    => $this->input->post('tglDistribusi')
                    );
                    $this->Madmin->ubah('tb_distribusi',$data4,$noBukti);
                    $this->Madmin->tambah('tb_kwitansi',$data);
                    $this->Madmin->ubah('tb_barang',$data2,$kodeBarang);
                    $this->Madmin->ubah('tb_bidang',$data3,$bidang);
                }
                $x++;
            }
        }
        $this->session->set_flashdata('notif2','<div class="alert alert-success" role="alert"> Ubah Data Berhasil <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('distribusi/formDistribusi');
    }
    public function hapusDistribusi($noBukti){
        $kd=$_POST['kodeBarang'];
        $jlh=$_POST['jumlah'];
        $x=0;
        foreach ($kd as $key) {
            $jumlahBarang = $this->Madmin->getWhere('tb_barang',array('kodeBarang' => $kd[$x]))->row()->jumlah;
            $data['jumlah'] = $jumlahBarang+$jlh[$x];
            $NIP_pegawai['NIP_pegawai'] = $this->Madmin->getWhere('tb_kwitansi',array('noBukti' => $noBukti))->row()->NIP_pegawai;
            $bidang['idBidang'] = $this->Madmin->getWhere('tb_pegawai',$NIP_pegawai)->row()->idBidang;
            $jatah = $this->Madmin->getWhere('tb_bidang',$bidang)->row()->jatah;
            $hargaBarang = $this->Madmin->getWhere('tb_barang',array('kodeBarang' => $kd[$x]))->row()->hargaSatuan;
            $jatahTambah = $jlh[$x]*$hargaBarang;
            $jatahSisa = $jatah+$jatahTambah;
            $data2['jatah'] = $jatahSisa;
            $this->Madmin->ubah('tb_barang',$data,array('kodeBarang' => $kd[$x]));
            $this->Madmin->ubah('tb_bidang',$data2,$bidang);
            $x++;
        }
        $this->db->delete('tb_distribusi',array('noBukti'=>$noBukti));
        $this->session->set_flashdata('notif2','<div class="alert alert-success" role="alert"> Hapus Data Berhasil <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/formDistribusi');
    }
    public function cetakDistribusi(){
        $data['data'] = $this->Madmin->getJoin5AllCetakDistribusi('tb_kwitansi','tb_barang','tb_pegawai','tb_bidang','*','tb_barang.kodeBarang = tb_kwitansi.kodeBarang','tb_pegawai.NIP_pegawai = tb_kwitansi.NIP_pegawai','tb_bidang.idBidang = tb_pegawai.idBidang')->result();
        $this->load->view('cetakDistribusi',$data);
    }
    public function cetakKwitansi(){
        $noBukti = $this->input->post('nmorBukti');
        $data['data'] = $this->Madmin->getJoinGroup23('tb_kwitansi','tb_barang','tb_pegawai','tb_bidang','*,tb_kwitansi.jumlah as jumlahKeluar,(tb_kwitansi.jumlah*tb_barang.hargaSatuan) as jumlahTotal','tb_barang.kodeBarang = tb_kwitansi.kodeBarang','tb_pegawai.NIP_pegawai = tb_kwitansi.NIP_pegawai','tb_bidang.idBidang = tb_pegawai.idBidang',$noBukti)->result_array();
        $data['data2'] = $this->Madmin->getJoinGroup23('tb_kwitansi','tb_barang','tb_pegawai','tb_bidang','*,tb_kwitansi.jumlah as jumlahKeluar,(tb_kwitansi.jumlah*tb_barang.hargaSatuan) as jumlahTotal,year(tglDistribusi) as tahun','tb_barang.kodeBarang = tb_kwitansi.kodeBarang','tb_pegawai.NIP_pegawai = tb_kwitansi.NIP_pegawai','tb_bidang.idBidang = tb_pegawai.idBidang',$noBukti)->result_array();
        $this->load->view('cetakKwitansi',$data);
    }
    public function barang()
    {
        $data['barang'] = $this->M_admin->lihat('tb_barang');
        $this->load->view('distribusi',$data);
    }
    public function getbarang($id)
    {

        $barang = $this->Madmin->get_by_id3($id);

        if ($barang) {

            if ($barang->jumlah <= '0') {
                $disabled = 'disabled';
                $info_stok = '<span class="help-block badge" id="reset" 
                              style="background-color: #d9534f;">
                              stok habis</span>';
            }else{
                $disabled = '';
                $info_stok = '<span class="help-block badge" id="reset" 
                              style="background-color: #5cb85c;">stok : '
                              .$barang->jumlah.'</span>';
            }

            echo '<div class="form-group">
                      <label class="control-label col-md-3" 
                        for="nama_barang">Nama Barang :</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control reset" 
                            name="nama_barang" id="nama_barang" 
                            value="'.$barang->namaBarang.'"
                            readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3" 
                        for="harga_barang">Harga (Rp) :</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control reset" id="harga_barang" name="harga_barang" 
                            value="'.number_format( $barang->hargaSatuan, 0 ,
                             '' , '.' ).'" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3" 
                        for="qty">Quantity :</label>
                      <div class="col-md-4">
                        <input type="number" class="form-control reset" 
                            name="qty" placeholder="Isi qty..." autocomplete="off" 
                            id="qty" onchange="subTotal(this.value)" 
                            onkeyup="subTotal(this.value)" min="0"  
                            max="'.$barang->jumlah.'" '.$disabled.'>
                      </div>'.$info_stok.'
                    </div>';
        }else{

            echo '<div class="form-group">
                      <label class="control-label col-md-3" 
                        for="nama_barang">Nama Barang :</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control reset" 
                            name="nama_barang" id="nama_barang" 
                            readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3" 
                        for="harga_barang">Harga (Rp) :</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control reset" 
                            name="harga_barang" id="harga_barang" 
                            readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3" 
                        for="qty">Quantity :</label>
                      <div class="col-md-4">
                        <input type="number" class="form-control reset" 
                            autocomplete="off" onchange="subTotal(this.value)" 
                            onkeyup="subTotal(this.value)" id="qty" min="0"  
                            name="qty" placeholder="Isi qty...">
                      </div>
                    </div>';
        }

    }
}
