<?php

namespace App\Http\Controllers;

use App\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedule = Schedule::all();
        return view ('Admin.Acara.index', [
            'title'=>'Schedule Acara',
            'Schedule'=>$schedule,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Acara.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $schedule = new Schedule;
        $schedule->nama_acara = $request->input('namaAcara');
        $schedule->tanggal = $request->input('tanggal');
        $schedule->tempat = $request->input('tempat');

        $schedule->save();
        return redirect()->back()->with('success','data tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $id)
    {
        // $schedule = new Schedule::find($id);
        return view('Admin.Acara.update', [
            'title'=>'Edit Schedule',
            // 'Schedule'=>$schedule,
            'Schedule'=>$id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        // $acara = new Schedule::find($schedule);
        $acara = $schedule;
        $acara->nama_acara = $request->namaAcara;
        $acara->tanggal = $request->tanggal;
        $acara->tempat = $request->tempat;

        $acara->save();
        return redirect()->route()->with('success','Data terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        // $acara = new Schedule::find($Schedule);
        $acara = $schedule;
        $acara->delete();
        return redirect()->back()->with('success','Data sudah terhapus');
    }
}
