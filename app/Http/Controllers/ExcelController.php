<?php

namespace App\Http\Controllers;

use App\Exports\ExportOrder;
use App\Models\order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function exportOrder() {
        return Excel::download(new ExportOrder, 'riwayat_pemakaian.xlsx');
    }
}
