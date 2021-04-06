<?php

namespace App\Http\Controllers;


 
use App\Models\Provinsi;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    public function getReportProvinsi()
    {
        return view('reports.provinsi');
    }

    public function ReportProvinsi(Request $request)
    {
        $awal = $request->awal;
        $akhir = $request->akhir;
        if ($awal < $akhir) {

            $provinsi = Provinsi::select('provinsis.id', 'provinsis.nama_provinsi', 'provinsis.kode_provinsi', 'kasuses.tanggal', 'kasuses.positif', 'kasuses.sembuh', 'kasuses.meninggal')
                ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')
                ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
                ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
                ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
                ->whereBetween('kasuses.tanggal', [$awal, $akhir])
                ->get();
                $tanggal = array($awal, $akhir);
            return view('reports.provinsi', compact('provinsi', 'tanggal'));
        } elseif ($awal > $akhir) {
            return redirect()->back()->with(['error' => 'Tanggal yang dimasukkan tidak valid']);

        }
    }

    public function PdfProvinsi(Request $request)
    {
        $awal = $request->awal;
        $akhir = $request->akhir;
        if ($awal < $akhir) {

            $provinsi = Provinsi::select('provinsis.id', 'provinsis.nama_provinsi', 'provinsis.kode_provinsi', 'kasuses.tanggal', 'kasuses.positif', 'kasuses.sembuh', 'kasuses.meninggal')
                ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')
                ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
                ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
                ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
                ->whereBetween('kasuses.tanggal', [$awal, $akhir])
                ->get();
            $pdf = PDF::loadview('reports.provinsipdf', compact('provinsi'));
            return $pdf->download('pdf-provinsi.pdf');

        } elseif ($awal > $akhir) {
            return redirect()->back()->with(['error' => 'Tanggal yang dimasukkan tidak valid']);

        }
    }
    // public function export_excel()
	// {
	// 	return Excel::download(new ProvinsiExport, 'ProvinsiReport.xlsx');
	// }
}
