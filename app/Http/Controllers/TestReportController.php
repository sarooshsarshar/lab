<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Resources\GroupModel;
use App\Resources\TestModel;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TestRole;
use App\Mail\TestRegistration;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Mail;

class TestReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $patient_name = $request->patient_name;
        $patient_id = $request->registration_no;
        $query =  DB::table('patientinfo')
            ->select(
                'patientinfo.patient_name',
                'patientinfo.id AS patient_id',
                'patientinfo.age',
                'patientinfo.gender',
                'patientinfo.phone_no',
                'patientinfo.email',
                'patientinfo.registration_date',
                'patientinfo.creation_date',
                'patientinfo.referred_by'
            )->leftJoin('textinfo', 'textinfo.patient_id', '=', 'patientinfo.id')
            ->whereNotNull('textinfo.patient_id');
        if (!empty($patient_name)) {
            $query->where('patientinfo.patient_name', 'LIKE', "%{$patient_name}%");
        }
        if (!empty($patient_id)) {
            $query->where('patientinfo.id', $patient_id);
        }
        $query->groupBy('patientinfo.id');
        $data["all_text"] = $query->get(); //$this->get_report_info($patient_id, $patient_name);
        return view('testReport.index', $data);
    }

    public function printReport($patient_id)
    {
        $data = $this->get_report_info($patient_id);
        $data = collect($data);
        $data = $data->groupBy('group_id')->toArray();
        $data["list"] = $data;
        return  view('print', $data);
    }
    public function get_report_info($patient_id = "", $patient_name = "")
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
                'test.detail',
                'unit.unit_name',
                'textinfo.values',
                'group.name AS group_name',
                'group.id AS group_id'
            );
        if (!empty($patient_id)) {
            $query->groupBy('textinfo.id');
            $query->where('patientinfo.id', $patient_id);
        } else {
            $query->groupBy('textinfo.group_id');
        }
        if (!empty($patient_name)) {
            $query->where('patientinfo.patient_name', $patient_name);
        }
        return $query->get();
    }
    public function addreport()
    {
        $data["groups"] =  GroupModel::all();

        $data["grouptest"] = !empty($data["groups"][0]["id"]) ?

            DB::table('test')
            ->leftJoin('unit', 'unit.id', '=', 'test.unit_id')
            ->select('test.id', 'test.group_id', 'test.prference_range', 'test.detail', 'test.unit_id', 'unit.unit_name', 'test.name AS test_name')
            ->where('test.status', 1)
            ->where('test.group_id', $data["groups"][0]["id"])
            ->get()
            : [];
        return view('testReport.add', $data);
    }

    public function testlist($group_id)
    {
        $data = DB::table('test')
            ->leftJoin('unit', 'unit.id', '=', 'test.unit_id')
            ->select('test.id', 'test.group_id',  'test.prference_range', 'test.detail', 'test.unit_id', 'unit.unit_name', 'test.name AS test_name')
            ->where('test.status', 1)
            ->where('test.group_id', $group_id)
            ->get();
        return response()->json(
            [
                'status' => empty($data) ? false : true,
                'data' => $data
            ]
        );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function testsave(TestRole $request)
    {
        $request->validated();
        $pin = rand(1, 99999);
        $patient_info = [
            'patient_name' => $request->patient_name,
            'age' => $request->age,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'referred_by' => $request->reffered_by,
            'other_info' => $request->other_info,
            'registration_date' => $request->register_date,
            'creation_date' => date('Y-m-d H:i:s'),
            'created_by' => Auth::id(),
        ];
        $patient_id = DB::table('patientinfo')->insertGetId(
            $patient_info
        );
        $testinfo = [];
        for ($i = 0; $i < count($request->test_group); $i++) {
            $group_id = $request->test_group[$i];
            for ($l = 0; $l < count($request->values[$group_id]); $l++) {
                if (!empty($request->values[$group_id][$l])) {

                    $testinfo[] = array(
                        "group_id" => $group_id,
                        "test_id" => $request->test_id[$group_id][$l],
                        "values" => $request->values[$group_id][$l],
                        "patient_id" => $patient_id,
                        "pin" => $pin
                    );
                }
            }
        }
        DB::table('textinfo')->insert(
            $testinfo
        );
        $data = $this->get_report_info($patient_id);
        $data = collect($data);
        $data = $data->groupBy('group_id')->toArray();
        $mail_info = [
            'pin' => $pin,
            'id' => $patient_id,
        ];
        if (!empty($request->email)) {
            Mail::to($request->email)->send(new TestRegistration($mail_info));
        }
        $data["list"] = $data;

        return  view('print', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_print($id)
    {

        $data["list"] = $this->get_report_info($id);
        $html =  view('print', $data);
        echo $html;
        exit;
        // echo "<pre>";
        // print_r($data);
        // exit;
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $htmlfile = "";
        foreach ($data as  $info) {
            $datad["info"] = $info;
            $htmlfile .= view('print');
        }
        // echo $htmlfile;
        // exit;
        $dompdf->loadHtml($htmlfile);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $dompdf->stream();
        exit;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
