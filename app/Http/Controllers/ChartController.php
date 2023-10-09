<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ChartController extends Controller
{
    public function index()
    {
        $totalFinanceiro = Booking::sum('total');
        $totalPorId = DB::table('rooms')
        ->select('floor', DB::raw('COUNT(*) as total_quartos'))
        ->groupBy('floor')
        ->get();

        // Agora formate os dados para o formato que o Chart.js entende
        $labels = [];
        $data = [];

        foreach ($totalPorId as $item) {
            $labels[] = 'Andar ' . $item->floor; // Use 'Andar' seguido do número do andar como rótulo
            $data[] = $item->total_quartos;
        }

        return View::make('dashboard.index', [
            'totalFinanceiro' => $totalFinanceiro,
            'totalPorId' => $totalPorId
        ]);
    }
}
