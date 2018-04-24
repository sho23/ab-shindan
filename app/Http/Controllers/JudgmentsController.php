<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Judgment;

class JudgmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($postId)
    {
        $judgment = DB::table('judgments')->where('post_id', $postId)->first();
        return view('judgments.edit', ['judgment' => $judgment]);
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
        $judgment = Judgment::find($id);

        for ($i=1; $i <= 6; $i++) {
            $this->validate($request, [
                'range' . $i => 'required|max:255',
                'range_text' . $i => 'required',
            ]);
            if (isset($request->{'range_img' . $i})) {
                if ($this->fileUpload($request, $i)) {
                    $filename = $request->{'range_img' . $i}->store('public/image/judgment');
                    $judgment->{'range_img' . $i} = basename($filename);
                } else {
                    return redirect()->back()->withInput()->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
                }
            }
        }
        $judgment->range1 = $request->range1;
        $judgment->range2 = $request->range2;
        $judgment->range3 = $request->range3;
        $judgment->range4 = $request->range4;
        $judgment->range5 = $request->range5;
        $judgment->range6 = $request->range6;
        $judgment->range_text1 = $request->range_text1;
        $judgment->range_text2 = $request->range_text2;
        $judgment->range_text3 = $request->range_text3;
        $judgment->range_text4 = $request->range_text4;
        $judgment->range_text5 = $request->range_text5;
        $judgment->range_text6 = $request->range_text6;
        $judgment->img_type = $request->img_type;
        $judgment->save();

        return redirect()->route('judgments.edit', $judgment->post_id)->with('succeed', '編集が完了しました');
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

    private function fileUpload($request, $order)
    {
        $this->validate($request, [
            'range_img' . $order => [
                'file',
                'dimensions:min_width=50,min_height=50,max_width=1200,max_height=1200',
            ]
        ]);
        return $request->file('range_img' . $order)->isValid([]);
    }
}
