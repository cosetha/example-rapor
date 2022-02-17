<?php

namespace App\Http\Controllers;

use App\m_guru;
use App\Relation;
use Illuminate\Http\Request;

class MGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // print_r(m_guru::find(1)->relation()->first()->tojson());
        // foreach (m_guru::find(1)->relation()->get() as $relation) {
        //     // $plan = $relation->kelas;
        //     // $student = $relation->mapel;

        //     // echo($relation."<br />");
        //     echo($relation);
        // }
       
        // // print_r(m_guru::find(1)->relation()->first()->mapel()->first()->nama);
        // foreach (m_guru::find(1)->relation()->first()->mapel()->get() as $relation) {
        //     echo($relation);
        // }

         foreach (m_guru::find(1)->relation()->get() as $relation) {
            // $plan = $relation->kelas;
            // $student = $relation->mapel;

            // echo($relation."<br />");
            echo($relation->kelas()->first()."<br>");
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = m_guru::find(2);
        $guru->relation()->create([
            'm_kelas_id' => 1,
            'm_mapel_id' => 1,
         ]);
         return response()->json([
            'error' => "MBULLLED"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guru = m_guru::find(2);
        $data = new Relation([
            'm_kelas_id' => 1,
            'm_mapel_id' => 1,
         ]);

         $guru->relation()->save($data);
         return response()->json([
            'error' => "MBULLL"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\m_guru  $m_guru
     * @return \Illuminate\Http\Response
     */
    public function show(m_guru $m_guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\m_guru  $m_guru
     * @return \Illuminate\Http\Response
     */
    public function edit(m_guru $m_guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\m_guru  $m_guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, m_guru $m_guru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\m_guru  $m_guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(m_guru $m_guru)
    {
        $guru = m_guru::find(2);
        $guru->relation()->whereColumn([
            ['m_mapel_id', '=', 1],
            ['m_kelas_id', '=', 1],
        ])->delete();
         return response()->json([
            'error' => "MBULLLEDIN"
        ]);
    }
}
