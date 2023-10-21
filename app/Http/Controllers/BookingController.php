<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Guest;
use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::orderBy('check_in_date', 'desc')->orderBy('check_out_date')->get();
        return view('booking.index', compact('bookings'));
    }

    public function exportPdf()
    {
        $bookings = Booking::all();
        $pdf = PDF::loadView('reservas', compact('bookings'));
        return $pdf->download('reservas.pdf');
    }

    public function exportExcel()
    {
        $bookings = Booking::all();
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet(); // Use o namespace completo
        $sheet = $spreadsheet->getActiveSheet();

        // Adicione os dados às células da planilha
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'TOTAL');
        $sheet->setCellValue('C1', 'GUEST_ID');
        $sheet->setCellValue('D1', 'CHECK_IN_DATE');
        $sheet->setCellValue('E1', 'CHECK_OUT_DATE');
        $sheet->setCellValue('F1', 'TYPE');
        $sheet->setCellValue('G1', 'STATUS');
        $sheet->setCellValue('H1', 'CREATED_BY');
        $sheet->setCellValue('I1', 'UPDATED_BY');
        $sheet->setCellValue('J1', 'CREATED_AT');
        $sheet->setCellValue('K1', 'UPDATED_AT');
        $sheet->setCellValue('L1', 'DELETED_AT');
        // Adicione mais colunas conforme necessário

        $row = 2;
        foreach ($bookings as $booking) {
            $sheet->setCellValue('A' . $row, $booking->id);
            $sheet->setCellValue('B' . $row, $booking->total);
            $sheet->setCellValue('C' . $row, $booking->guest_id);
            $sheet->setCellValue('D' . $row, $booking->check_in_date);
            $sheet->setCellValue('E' . $row, $booking->check_out_date);
            $sheet->setCellValue('F' . $row, $booking->type);
            $sheet->setCellValue('G' . $row, $booking->status);
            $sheet->setCellValue('H' . $row, $booking->created_by);
            $sheet->setCellValue('I' . $row, $booking->updated_by);
            $sheet->setCellValue('J' . $row, $booking->created_at);
            $sheet->setCellValue('K' . $row, $booking->updated_at);
            $sheet->setCellValue('L' . $row, $booking->deleted_at);
            // Adicione mais colunas conforme necessário
            $row++;
        }
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet); // Use o namespace completo
        $fileName = 'reservas.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($temp_file);

        return response()->download($temp_file, $fileName); // Use 'response()' em vez de 'Response::'
    }

    public function exportCsv()
    {
        $bookings = Booking::all();
        $fileName = 'reservas.csv';
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );
        $callback = function () use ($bookings) {
            $file = fopen('php://output', 'w');
            fputcsv($file, array_keys($bookings[0]->toArray()), ';');  // Header row
            foreach ($bookings as $booking) {
                fputcsv($file, $booking->toArray(), ';');
            }
            fclose($file);
        };
        return Response::stream($callback, 200, $headers);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guests = Guest::get();
        return view('booking.create', compact('guests'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookingRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['check_in_date'] = Carbon::parse($validated['check_in_date'])->toDateString();
            $validated['check_out_date'] = Carbon::parse($validated['check_out_date'])->toDateString();
            $booking = Booking::create($validated);
            $rooms = $request->input('rooms', []);
            $booking->rooms()->attach($rooms);
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }

        return redirect()->route('booking.index')->with('success', 'New Booking Successfully Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        dd('edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        dd('update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        try {
            $booking->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }

        return redirect()->route('booking.index')->with('success', 'Successfully Cancel Booking!');
    }

    public function canceledList()
    {
        $bookings = Booking::orderBy('check_in_date', 'desc')->orderBy('check_out_date')->onlyTrashed()->get();
        return view('booking.canceled-list', compact('bookings'));
    }
}
