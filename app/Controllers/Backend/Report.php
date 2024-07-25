<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TransaksiModel;
use App\Models\TransaksiDetailModel;
use Dompdf\Dompdf;

class Report extends BaseController
{
    protected $transaksiModel, $transaksiDetailModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
        $this->transaksiDetailModel = new TransaksiDetailModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Report | Recaka',
            'content_header' => 'Report',
            'orders' => $this->transaksiModel
                ->select('kode_transaksi, nama_member, tanggal_transaksi, pembayaran.status, total')
                ->join('members', 'transaksi.member_id = members.id')
                ->join('pembayaran', 'pembayaran.transaksi_kode = transaksi.kode_transaksi')
                ->where('pembayaran.status !=', null)
                ->orderBy('tanggal_transaksi', 'DESC')
                ->findAll()
        ];

        return view('backend/reports/index', $data);
    }

    // public function filter()
    // {
    //     $startDate = $this->request->getPost('start_date');
    //     $endDate = $this->request->getPost('end_date');

    //     $data = [
    //         'title' => 'Report | Recaka',
    //         'content_header' => 'Report',
    //         'orders' => dd($this->transaksiModel
    //             ->select('kode_transaksi, nama_member, tanggal_transaksi, pembayaran.status, total')
    //             ->join('members', 'transaksi.member_id = members.id')
    //             ->join('pembayaran', 'pembayaran.transaksi_kode = transaksi.kode_transaksi')
    //             ->where('tanggal_transaksi >= "' . $startDate . '" AND <= tanggal_transaksi "' . $endDate . '"')
    //             // ->orderBy('tanggal_transaksi', 'DESC')
    //             ->findAll())
    //     ];

    //     return view('backend/reports/index', $data);
    // }

    public function filter()
    {
        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');

        $data = [
            'title' => 'Report | Recaka',
            'content_header' => 'Report',
            'start_date' => $startDate,
            'end_date' => $endDate,
            'orders' => $this->transaksiModel
                ->select('kode_transaksi, nama_member, tanggal_transaksi, pembayaran.status, total')
                ->join('members', 'transaksi.member_id = members.id')
                ->join('pembayaran', 'pembayaran.transaksi_kode = transaksi.kode_transaksi')
                ->where('DATE(tanggal_transaksi) >=', $startDate)
                ->where('DATE(tanggal_transaksi) <=', $endDate)
                ->where('pembayaran.status !=', null)
                ->orderBy('tanggal_transaksi', 'DESC')
                ->findAll()
        ];

        return view('backend/reports/index', $data);
    }

    public function cetak_pdf()
    {
        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');

        $data = [
            'title' => 'Report | Recaka',
            'start_date' => $startDate,
            'end_date' => $endDate,
            'orders' => $this->transaksiModel
                ->select('kode_transaksi, nama_member, tanggal_transaksi, pembayaran.status, total')
                ->join('members', 'transaksi.member_id = members.id')
                ->join('pembayaran', 'pembayaran.transaksi_kode = transaksi.kode_transaksi')
                ->where('DATE(tanggal_transaksi) >=', $startDate)
                ->where('DATE(tanggal_transaksi) <=', $endDate)
                ->where('pembayaran.status !=', null)
                ->orderBy('tanggal_transaksi', 'DESC')
                ->findAll()
        ];

        // Load view untuk PDF
        $html = view('backend/reports/income_reports', $data);

        // Generate PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Output the generated PDF (1 = download, 0 = preview)
        $dompdf->stream("laporan-transaksi.pdf", array("Attachment" => 0));
    }
}
