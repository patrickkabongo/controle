<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Transaction;

class ReportController extends Controller
{
    //
    public function index()
    {
        return view('graph');
    }

    public function data()
    {
        $in = Transaction::getAgregateDataByMonth('>');
        $out = Transaction::getAgregateDataByMonth('<');
        //$diff = Transaction::getAgregateDataByMonth();

        $inValues = Transaction::getValuesToReportList($in);
        $outValues = Transaction::getValuesToReportList($out);
        //$diffValues = Transaction::getValuesToReportList($diff);
    	return [
            'labels' => array_keys($inValues),
            'in' => $inValues,
            'out' => $outValues,
          //  'diff' => $diffValues,
    	];
    }
}
