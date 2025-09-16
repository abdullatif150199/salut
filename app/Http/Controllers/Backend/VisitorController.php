<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function getMonthlyVisitorStats()
    {
        $data = Visitor::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', now()->year)
            ->groupByRaw('MONTH(created_at)')
            ->pluck('total', 'month');

        return response()->json($data);
    }

    public function getWeeklyVisitorStats()
    {
        $startDate = now()->subDays(6)->startOfDay();
        $endDate = now()->endOfDay();

        $rawData = Visitor::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');


        $data = collect();
        for ($i = 0; $i <= 6; $i++) {
            $date = now()->subDays(6 - $i)->format('Y-m-d');
            $total = $rawData->has($date) ? $rawData[$date]->total : 0;

            $data->push([
                'date' => $date,
                'total' => $total,
            ]);
        }

        return response()->json($data);
    }

    public function export(Request $request)
    {
        $query = Applicant::query();

        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        if ($request->filled('package_id')) {
            $query->where('package_id', $request->package_id);
        }

        $visitors = $query->get();

        $filename = "data visitors";

        if ($request->filled('start_date')) {
            $filename .= " dari tanggal " . \Carbon\Carbon::parse($request->start_date)->format('d-m-Y');
        }

        if ($request->filled('end_date')) {
            $filename .= " sampai tanggal " . \Carbon\Carbon::parse($request->end_date)->format('d-m-Y');
        }

        // if ($request->filled('package_id')) {
        //     $package = Package::find($request->package_id);
        //     if ($package) {
        //         $filename .= " paket " . $package->name;
        //     }
        // }

        $filename .= ".xls";

        $headers = [
            "Content-Type" => "application/vnd.ms-excel",
            "Content-Disposition" => "attachment; filename=\"$filename\""
        ];

        $content = "<table border='1'>
        <tr>
            <th>Tanggal</th>
            <th>Program</th>
            <th>Nama</th>
            <th>WA</th>
            <th>Email</th>
            <th>Pesan</th>
        </tr>";

        foreach ($visitors as $v) {
            $content .= "<tr>
            <td>" . \Carbon\Carbon::parse($v->created_at)->translatedFormat('d F Y') . "</td>
            <td>" . ($v->program ?? '-') . "</td>
            <td>" . htmlspecialchars($v->name) . "</td>
            <td>" . htmlspecialchars(' ' . $v->wa) . "</td>
            <td>" . htmlspecialchars(' ' . $v->email) . "</td>
            <td>" . htmlspecialchars($v->message) . "</td>
        </tr>";
        }

        $content .= "</table>";

        return response($content, 200, $headers);
    }
}
