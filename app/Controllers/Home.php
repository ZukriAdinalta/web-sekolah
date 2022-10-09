<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\DownModel;
use App\Models\FotoModel;
use App\Models\GalleryModel;
use App\Models\GuruModel;
use App\Models\MapelModel;
use App\Models\PengumumanModel;
use App\Models\PrestasiModel;
use App\Models\SekolahModel;
use App\Models\SiswaModel;
use App\Models\SlideModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->BeritaModel = new BeritaModel();
        $this->GalleryModel = new GalleryModel();
        $this->FotoModel = new FotoModel();
        $this->SlideModel = new SlideModel();
        $this->PengumumanModel = new PengumumanModel();
        $this->GuruModel = new GuruModel();
        $this->SiswaModel = new SiswaModel();
        $this->MapelModel = new MapelModel();
        $this->DownModel = new DownModel();
        $this->SekolahModel = new SekolahModel();
        $this->PrestasiModel = new PrestasiModel();

    }
    public function index()
    {  
        $berita = $this->BeritaModel
        ->join('users', 'users.id = berita.id_user', 'left')
        ->orderBy('id_berita', 'DESC')->limit(4, 1)->find();
        $berita2 = $this->BeritaModel
        ->join('users', 'users.id = berita.id_user', 'left')
        ->orderBy('id_berita', 'DESC')->limit(1)->find();
        $data = [
            'title' => 'SMAN 2 SUNGAI LIMAU',
            'link' => $this->request->uri->getSegment(1),
            'berita' => $berita,
            'berita2' => $berita2,
            'sekolah' => $this->SekolahModel->first(),
            'slide' => $this->SlideModel->getSlide(),
            'pengumuman' => $this->PengumumanModel->getLimit(),
            'prestasi' => $this->PrestasiModel->getLimit(),
            'guru' => $this->GuruModel->getLimit(),
        ];
        return view('home', $data);
    }
/* #########################################  Berita ########################################################## */
    public function berita()
    {
        $data = [
            'title' => 'Halaman Berita',
            'sekolah' => $this->SekolahModel->first(),
            'limit' => $this->BeritaModel->getLimit(),
            'populer' => $this->BeritaModel->getPopuler(),
            'link' => $this->request->uri->getSegment(2),
            'berita' => $this->BeritaModel->orderBy('id_berita', 'DESC')->paginate('8', 'berita'),
            'pager' => $this->BeritaModel->pager,
        ];
        return view('fontend/berita', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'SMAN 2 SUNGAI LIMAU - BERITA',
            'sekolah' => $this->SekolahModel->first(),
            'link' => $this->request->uri->getSegment(2),
            'limit' => $this->BeritaModel->getLimit(),
            'populer' => $this->BeritaModel->getPopuler(),
            'berita' => $this->BeritaModel->getDetail($slug),
            'limit' => $this->BeritaModel->getLimit(),
        ];
        
        $this->BeritaModel->update_counter($slug);
        return view('/fontend/detailberita', $data);
    }

/* #########################################  Download ########################################################## */
    public function down(){
        $data =[
        'title' => 'Halaman Download File',
        'sekolah' => $this->SekolahModel->first(),
        'link' => $this->request->uri->getSegment(2),
        'down' => $this->DownModel->findAll()
        ];
    
        return view('fontend/down', $data);
    }

/* #########################################  Gelery  ########################################################## */
    public function gallery()
    {
        $gallery = $this->GalleryModel->select('gallery. *, count(foto.id_gallery) as jml_foto')
        ->join('foto', 'foto.id_gallery = gallery.id_gallery', 'left')
        ->groupBy('gallery.id_gallery')
        ->orderBy('gallery.id_gallery', 'DESC');
        $data = [
            'title' => 'Halaman Gallery',
            'sekolah' => $this->SekolahModel->first(),
            'link' => $this->request->uri->getSegment(2),
            'gallery' => $gallery->paginate('6', 'gallery'),
            'pager' => $this->GalleryModel->pager,
        ];
        return view('fontend/gallery', $data);
    }

    public function foto($id_gallery)
    {
        $data = [
            'title' => 'Foto Gallery',
            'sekolah' => $this->SekolahModel->first(),
            'foto' => $this->FotoModel->getFoto($id_gallery),
            'gallery' => $this->GalleryModel->getData($id_gallery),
            'link' => $this->request->uri->getSegment(2),
        ];
        return view('fontend/foto', $data);
    }
/* #########################################  Prestasi  ########################################################## */
public function prestasi()
    {
        $data = [
            'title' => 'Prestasi Sekolah',
            'sekolah' => $this->SekolahModel->first(),
            'limit' => $this->BeritaModel->getLimit(),
            'populer' => $this->BeritaModel->getPopuler(),
            'link' => $this->request->uri->getSegment(2),
            'prestasi' => $this->PrestasiModel->orderBy('id', 'DESC')->paginate('8', 'prestasi'),
            'pager' => $this->PrestasiModel->pager,
        ];
        return view('fontend/prestasi/index', $data);
    }

    public function detailPrestasi($slug)
    {
        $data = [
            'title' => 'Prestasi Sekolah',
            'sekolah' => $this->SekolahModel->first(),
            'link' => $this->request->uri->getSegment(2),
            'limit' => $this->BeritaModel->getLimit(),
            'populer' => $this->BeritaModel->getPopuler(),
            'prestasi' => $this->PrestasiModel->getDetail($slug),
            'limit' => $this->BeritaModel->getLimit(),
        ];
        return view('/fontend/prestasi/detail', $data);
    }

/* ###################################### Tampilan Guru Data ###################################################### */
public function guru(){
    $data =[
      'title' => 'Guru Sekolah',
      'sekolah' => $this->SekolahModel->first(),
      'link' => $this->request->uri->getSegment(2),
      'guru' => $this->GuruModel->getGuru(),
      'mapel' => $this->MapelModel->getMapel()
    ];
  
    return view('fontend/guru', $data);
  }
/* ###################################### Tampilan Siswa Data ###################################################### */
public function Siswa(){
    $data =[
      'title' => 'Siswa',
      'sekolah' => $this->SekolahModel->first(),
      'link' => $this->request->uri->getSegment(2),
      'siswa' => $this->SiswaModel->getData(),
    ];
  
    return view('fontend/siswa', $data);
  }
/* #########################################  Sekolah  ########################################################## */

    public function visiMisi($id)
        {
            $data = [
                'title' => 'Visi Dan Misi',
                'sekolah' => $this->SekolahModel->getData($id),
                'limit' => $this->BeritaModel->getLimit(),
                'populer' => $this->BeritaModel->getPopuler(),
                'limit' => $this->BeritaModel->getLimit(),
                'link' => $this->request->uri->getSegment(2),
            ];
            return view('fontend/visimisi', $data);
        }
        
    public function Sejarah($id)
        {
            $data = [
                'title' => 'Sejarah Sekolah',
                'sekolah' => $this->SekolahModel->getData($id),
                'limit' => $this->BeritaModel->getLimit(),
                'populer' => $this->BeritaModel->getPopuler(),  
                'limit' => $this->BeritaModel->getLimit(),
                'link' => $this->request->uri->getSegment(2),
            ];
            return view('fontend/sejarah', $data);
        }
    public function Organisasi($id)
    {
        $data = [
            'title' => 'Struktur Organisasi',
            'sekolah' => $this->SekolahModel->getData($id),
            'limit' => $this->BeritaModel->getLimit(),
            'populer' => $this->BeritaModel->getPopuler(),
            'limit' => $this->BeritaModel->getLimit(),
            'link' => $this->request->uri->getSegment(2),
        ];
        return view('fontend/organisasi', $data);
    }

    public function kepsek($id)
    {
        $data = [
            'title' => 'Kepala Sekolah',
            'sekolah' => $this->SekolahModel->getData($id),
            'limit' => $this->BeritaModel->getLimit(),
            'populer' => $this->BeritaModel->getPopuler(),
            'limit' => $this->BeritaModel->getLimit(),
            'link' => $this->request->uri->getSegment(2),
        ];
        return view('fontend/kepsek', $data);
    }
/* ###################################### Tampilan FontEnd Kontak ###################################################### */
public function kontak(){
    $data =[
      'title' => 'Kontak Kami',
      'sekolah' => $this->SekolahModel->first(),
      'link' => $this->request->uri->getSegment(2),
    ];
  
    return view('fontend/kontak', $data);
  }
/* #########################################  Pengumuman  ########################################################## */
public function pengumuman()
    {
        $data = [
            'title' => 'Pengumuman Sekolah',
            'sekolah' => $this->SekolahModel->first(),
            'limit' => $this->BeritaModel->getLimit(),
            'populer' => $this->BeritaModel->getPopuler(),
            'link' => $this->request->uri->getSegment(2),
            'pengumuman' => $this->PengumumanModel->orderBy('id', 'DESC')->paginate('8', 'pengumuman'),
            'pager' => $this->PengumumanModel->pager,
        ];
        return view('fontend/pengumuman/index', $data);
    }

    public function detailpengumuman($slug)
    {
        $data = [
            'title' => 'Penguman Sekolah',
            'sekolah' => $this->SekolahModel->first(),
            'link' => $this->request->uri->getSegment(2),
            'limit' => $this->BeritaModel->getLimit(),
            'populer' => $this->BeritaModel->getPopuler(),
            'pengumuman' => $this->PengumumanModel->getDetail($slug),
            'limit' => $this->BeritaModel->getLimit(),
        ];
        return view('/fontend/pengumuman/detail', $data);
    }
}