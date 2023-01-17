<?php

namespace App\Http\Controllers;

use App\BookingModel;
use App\BookingTest;
use App\Resources\TestModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Svg\Tag\Rect;

class TestDetailsController extends Controller
{
    public function test_list(Request $request)
    {
        $data["test"] = TestModel::get();
        return view('public_sec/test_list' , $data);
    }

    public function patient_report(Request $request)
    {
        if (!empty($request->reg_no) && !empty($request->pin)) {
            $data = $this->get_report_info($request->reg_no , $request->pin);
            if(!empty($data[0])){
            $data = collect($data);
            $data = $data->groupBy('group_id')->toArray();
            $data["list"] = $data;
            return  view('print', $data);
        }
        return redirect()->route('test.patient.list')->with(['status' => 0, 'message' => 'Report Not Found!']);
        }
        return view('public_sec/patient_test_list');
    }

    public function test_book()
    {
        $test = TestModel::get();
        return view('public_sec/test_book' , compact('test'));        
    }
    public function test_book_save(Request $request)
    {
        $request->validate([
            'name' => 'required|max:220',
            'email' => 'required|max:120',
            'phone' => 'required|max:20',
            'tests' => 'required',
            'date' => 'required',
            'time' => 'required',
            'address' => 'required|max:400',
            'booking_type' => 'required',
        ]);
       
        $booking = BookingModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date' => $request->date,
            'time' => $request->time,
            'booking_type' => $request->booking_type,
            'address' => $request->address,
        ]);
        foreach ($request->tests as $item) {
           BookingTest::create(
               [
                'booking_id' => $booking->id,
                'test_id' => $item,
               ]
               );
        }
        
        return redirect()->route('test.patient.book')->with(['status' => 1, 'message' => 'Thanks For Ordering.Our Agent will Contact you for confirmation!']); 
           
    }
    public function get_report_info($patient_id , $pin )
    {
        $query =  DB::table('patientinfo')

            ->join('textinfo', 'textinfo.patient_id', '=', 'patientinfo.id')
            ->join('test', 'test.id', '=', 'textinfo.test_id')
            ->leftJoin('unit', 'unit.id', '=', 'test.unit_id')
            ->join('group', 'group.id', '=', 'textinfo.group_id')

            ->select(
                'patientinfo.patient_name',
                'patientinfo.id AS patient_id',
                'patientinfo.age',
                'patientinfo.gender',
                'patientinfo.phone_no',
                'patientinfo.email',
                'patientinfo.registration_date',
                'patientinfo.creation_date',
                'patientinfo.referred_by',
                'test.name AS test_name',
                'test.prference_range',
                'unit.unit_name',
                'textinfo.values',
                'group.name AS group_name',
                'group.id AS group_id'
            );
            $query->groupBy('textinfo.id');
            $query->where('patientinfo.id', $patient_id);
            $query->where('textinfo.pin', $pin);
        return $query->get();
    }
}
