<?php

namespace App\Http\Controllers;

use App\m_wali_murid;
use App\m_guru;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MWaliMuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('guru')->find(2);
        echo($user."<br>");
        $wali =  User::with('wali')->find(5);
        echo($wali);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\m_wali_murid  $m_wali_murid
     * @return \Illuminate\Http\Response
     */
    public function show(m_wali_murid $m_wali_murid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\m_wali_murid  $m_wali_murid
     * @return \Illuminate\Http\Response
     */
    public function edit(m_wali_murid $m_wali_murid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\m_wali_murid  $m_wali_murid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, m_wali_murid $m_wali_murid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\m_wali_murid  $m_wali_murid
     * @return \Illuminate\Http\Response
     */
    public function destroy(m_wali_murid $m_wali_murid)
    {
        //
    }
}
