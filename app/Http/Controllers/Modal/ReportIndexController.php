<?php

namespace App\Http\Controllers\Modal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ReportIndexController extends Controller
{
    function IndexModalReport(Request $request){
        $category = DB::table('question')
            ->join('category', 'question.id_category','category.id_category')
            ->select([
                'question.id_category',
                'category.name',
                DB::raw('count(question.question) as j_quest')
                ])
            ->groupBy([
                'question.id_category',
                'category.name',
            ])
            ->get();

        $answer = DB::table('answer')
            ->where('answer.id_respondent',$request->id_respondent)
            ->join('question', 'answer.id_question','question.id_question')
            ->select([
                'answer.answer',
                'question.question',
                'question.id_question',
                'question.id_category'
            ])
            ->get();

        foreach($answer as $d){
            if($d->answer == 5){
                $jawaban[$d->id_question] = 'Sangat Tidak Sesuai';
            }
            elseif($d->answer == 4){
                $jawaban[$d->id_question] = 'Tidak Sesuai';
            }
            elseif($d->answer == 3){
                $jawaban[$d->id_question] = 'Normal';
            }
            elseif($d->answer == 2){
                $jawaban[$d->id_question] = 'Sesuai';
            }
            elseif($d->answer == 1){
                $jawaban[$d->id_question] = 'Sangat Sesuai';
            }
        }

        $comment = DB::table('comment')
            ->where('comment.id_respondent',$request->id_respondent)
            ->join('category', 'category.id_category','comment.id_category')
            ->select([
                'comment.comment',
                'comment.id_category',
                'category.name'
            ])
            ->get();

        return view('admin.modal.report-modal', compact('category','answer','jawaban', 'comment'));


    }

    function DownloadReport(Request $request){
        $category = DB::table('question')
            ->join('category', 'question.id_category','category.id_category')
            ->select([
                'question.id_category',
                'category.name',
                DB::raw('count(question.question) as j_quest')
                ])
            ->groupBy([
                'question.id_category',
                'category.name',
            ])
            ->get();

        $respondent = DB::table('respondent')
            ->where('respondent.id_respondent',$request->id_respondent)
            ->select('*')
            ->get();




        foreach($respondent as $r){
            if($r->pengalaman == 3){
                $respondent[0]->pengalaman = ' > 5 Tahun';
            }
            elseif($r->pengalaman == 2){
                $respondent[0]->pengalaman = ' 1 - 5 Tahun';
            }
            elseif($r->pengalaman == 1){
                $respondent[0]->pengalaman = ' < 1 Tahun';
            }
        }

        $answer = DB::table('answer')
            ->where('answer.id_respondent',$request->id_respondent)
            ->join('question', 'answer.id_question','question.id_question')
            ->select([
                'answer.answer',
                'question.question',
                'question.id_question',
                'question.id_category'
            ])
            ->get();

        foreach($answer as $d){
            if($d->answer == 5){
                $jawaban[$d->id_question] = 'Sangat Tidak Sesuai';
            }
            elseif($d->answer == 4){
                $jawaban[$d->id_question] = 'Tidak Sesuai';
            }
            elseif($d->answer == 3){
                $jawaban[$d->id_question] = 'Normal';
            }
            elseif($d->answer == 2){
                $jawaban[$d->id_question] = 'Sesuai';
            }
            elseif($d->answer == 1){
                $jawaban[$d->id_question] = 'Sangat Sesuai';
            }
        }




        $result = DB::table('answer')
            ->where('answer.id_respondent',$request->id_respondent)
            ->select('answer', DB::raw('count(answer) as total'))
            ->groupBy('answer')
            ->get();




        foreach($result as $res){
            if($res->answer == 5){
                $result[4]->answer = 'Sangat Tidak Sesuai';
            }
            elseif($res->answer == 4){
                $result[3]->answer = 'Tidak Sesuai';
            }
            elseif($res->answer == 3){
                $result[2]->answer = 'Normal';
            }
            elseif($res->answer == 2){
                $result[1]->answer = 'Sesuai';
            }
            elseif($res->answer == 1){
                $result[0]->answer = 'Sangat Sesuai';
            }
        }

        $chartTotal = "";
        $chartTitle = "";
        foreach($result as $key=>$res){
            if ($key == 0) {
                $chartTotal = $res->total;
                $chartTitle = $res->answer;
            }else{
                $chartTotal = $chartTotal.",". $res->total;
                $chartTitle = $chartTitle.",". $res->answer;
            }
            
        }
        $resultTitle = $chartTitle;
        $resultTotal = $chartTotal;
        // $result['answer'] =  $chartTitle;
        // $result['total'] = $chartTotal;
        // echo json_encode($result);
        



        $comment = DB::table('comment')
            ->where('comment.id_respondent',$request->id_respondent)
            ->join('category', 'category.id_category','comment.id_category')
            ->select([
                'comment.comment',
                'comment.id_category',
                'category.name'
            ])
            ->get();
        // echo json_encode($comment->count());
        // dd($comment);

        return view('admin.download.report-download', compact('respondent', 'category','answer','jawaban', 'comment', 'resultTitle','resultTotal'));
       
        // return view('admin.modal.report-modal', compact('category','answer','jawaban'));

    }


    public function StoreImage(Request $request)
    {

        // echo json_encode("jhello");
        // echo json_encode($request);


        $img = $request->img;
        $id_respondent = $request->id_respondent;

        // echo json_encode($base64File);

        // decode the base64 file
        // $fileData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64File));
        // echo json_encode("file : ");
        // echo json_encode("file : ".$fileData);

        // // save it to temporary dir first.
        // $tmpFilePath = '/';

        // echo json_encode($tmpFilePath);
        

        $folderPath = public_path()."\admin\\img\\chart\\";

        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("\admin\\img\\chart\\", $image_parts[0]);
        // $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . "respondent_" .$id_respondent . '.jpg';

        file_put_contents($file, $image_base64);


        // file_put_contents($tmpFilePath, $fileData);

        // // this just to help us get file info.
        // $tmpFile = new File($tmpFilePath);

        // $file = new UploadedFile(
        //     $tmpFile->getPathname(),
        //     $tmpFile->getFilename(),
        //     $tmpFile->getMimeType(),
        //     0,
        //     true // Mark it as test, since the file isn't from real HTTP POST.
        // );

        // $file->store('chart');

        // $request->validate([
        //   'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        // $image = new Image;

        // if ($request->file('file')) {
        //     $imagePath = $request->file('file');
        //     $imageName = $imagePath->getClientOriginalName();

        //     $path = $request->file('file')->storeAs('uploads', $imageName, 'public');
        // }

        // $image->name = $imageName;
        // $image->path = '/storage/'.$path;
        // $image->save();

        return response()->json('Image uploaded successfully');
    }



}