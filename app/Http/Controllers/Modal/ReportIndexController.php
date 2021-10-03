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
                'answer.reason',
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
            // ->join('comment', 'category.id_category','comment.id_category')
            // ->join('page', 'page.id_page','category.id_page')
            ->select([
                'question.id_category',
                'category.name',
                'category.id_page',
                // 'comment.comment',
                // 'comment.id_category',
                DB::raw('count(question.question) as j_quest')
                ])
            ->groupBy([
                'question.id_category',
                'category.name',
                'category.id_page',
                // 'comment.comment',
                // 'comment.id_category',
            ])
            ->get();

        $respondent = DB::table('respondent')
            ->where('respondent.id_respondent',$request->id_respondent)
            ->select('*')
            ->get();

        $page = DB::table('page')
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
                'answer.reason',
                'question.question',
                'question.id_question',
                'question.id_category'
            ])
            ->get();

        // foreach($answer as $d){
        //     if($d->answer == 5){
        //         $jawaban[$d->id_question] = 'Sangat Tidak Sesuai';
        //     }
        //     elseif($d->answer == 4){
        //         $jawaban[$d->id_question] = 'Tidak Sesuai';
        //     }
        //     elseif($d->answer == 3){
        //         $jawaban[$d->id_question] = 'Normal';
        //     }
        //     elseif($d->answer == 2){
        //         $jawaban[$d->id_question] = 'Sesuai';
        //     }
        //     elseif($d->answer == 1){
        //         $jawaban[$d->id_question] = 'Sangat Sesuai';
        //     }
        // }


        // $result = DB::table('answer')
        //     ->where('answer.id_respondent',$request->id_respondent)
        //     ->join('question', 'answer.id_question','question.id_question')
        //     ->select([
        //         'answer.answer',
        //         'answer.reason',
        //         'question.question',
        //         'question.id_question',
        //         'question.id_category'
        //     ])
        //     ->get();


        $comment = DB::table('comment')
            ->where('comment.id_respondent',$request->id_respondent)
            ->join('category', 'category.id_category','comment.id_category')
            ->select([
                'comment.id',
                'comment.comment',
                'comment.id_category',
                'category.name',
                'category.id_page'
            ])
            ->get();

            // echo json_encode($comment);



            $result = DB::table('page')
                ->select('*')
                ->get();



        if ($comment->count() > 0) {
            foreach ($comment as  $key => $com) {
                // echo json_encode($comment);



                $five =  0;
                $four =  0;
                $thre =  0;
                $two  =  0;
                $one  =  0;

                foreach($answer as $res){

                    // echo $com->id;
                    // echo $key;

                    if ($com->id_category == $res->id_category) {
                        if($res->answer == 5){
                            $five = $five + 5;
                            $four = $four + 0;
                            $thre = $thre + 0;
                            $two  = $two  + 0;
                            $one  = $one  + 0;
                        }
                        elseif($res->answer == 4){
                            $five = $five + 0;
                            $four = $four + 4;
                            $thre = $thre + 0;
                            $two  = $two  + 0;
                            $one  = $one  + 0;
                        }
                        elseif($res->answer == 3){
                            $five = $five + 0;
                            $four = $four + 0;
                            $thre = $thre + 3;
                            $two  = $two  + 0;
                            $one  = $one  + 0;
                        }
                        elseif($res->answer == 2){
                            $five = $five + 0;
                            $four = $four + 0;
                            $thre = $thre + 0;
                            $two  = $two  + 2;
                            $one  = $one  + 0;
                        }
                        elseif($res->answer == 1){
                            $five = $five + 0;
                            $four = $four + 0;
                            $thre = $thre + 0;
                            $two  = $two  + 0;
                            $one  = $one  + 1;
                        }else{
                            $five = $five + 0;
                            $four = $four + 0;
                            $thre = $thre + 0;
                            $two  = $two  + 0;
                            $one  = $one  + 0; 
                        }

                    }

                    $comment[$key]->five = $five;
                    $comment[$key]->four = $four;
                    $comment[$key]->thre = $thre;
                    $comment[$key]->two = $two;
                    $comment[$key]->one = $one;
                    $comment[$key]->rate =  ($five+$four+$thre+$two+$one)/5;
                }
            }



            // echo json_encode($comment);



            // $result = array();
            foreach ($result as $k => $p) {

                // echo $k;
                $rowRate = [];
                $rowTitle = [];
                // $row = (object) array("data"=>"", "title"=>"");


                foreach($comment as $key=>$come){
                    if ($p->id_page == $come->id_page) {
                        if ($key == 0 || $p->name == $come->name) {
                            // echo $key;
                            $rowRate = $come->rate;
                            $rowTitle = $come->name;
                        }else{
                            $rowRate = $rowRate.",". $come->rate;
                            $rowTitle = $rowTitle.",". $come->name;
                        }
                        // array_push($rowRate, $come->rate);
                        // array_push($rowTitle, $come->name);
                    }
                }

                $result[$k]->rate = $rowRate;
                $result[$k]->title = $rowTitle;
                // array_push($result, $row);

                // $result[$p->name] = $row;
            }

        }else{
            foreach ($category as  $key => $com) {
                // echo json_encode($comment);



                $five =  0;
                $four =  0;
                $thre =  0;
                $two  =  0;
                $one  =  0;

                foreach($answer as $res){

                    // echo $com->id;
                    // echo $key;

                    if ($com->id_category == $res->id_category) {
                        if($res->answer == 5){
                            $five = $five + 5;
                            $four = $four + 0;
                            $thre = $thre + 0;
                            $two  = $two  + 0;
                            $one  = $one  + 0;
                        }
                        elseif($res->answer == 4){
                            $five = $five + 0;
                            $four = $four + 4;
                            $thre = $thre + 0;
                            $two  = $two  + 0;
                            $one  = $one  + 0;
                        }
                        elseif($res->answer == 3){
                            $five = $five + 0;
                            $four = $four + 0;
                            $thre = $thre + 3;
                            $two  = $two  + 0;
                            $one  = $one  + 0;
                        }
                        elseif($res->answer == 2){
                            $five = $five + 0;
                            $four = $four + 0;
                            $thre = $thre + 0;
                            $two  = $two  + 2;
                            $one  = $one  + 0;
                        }
                        elseif($res->answer == 1){
                            $five = $five + 0;
                            $four = $four + 0;
                            $thre = $thre + 0;
                            $two  = $two  + 0;
                            $one  = $one  + 1;
                        }else{
                            $five = $five + 0;
                            $four = $four + 0;
                            $thre = $thre + 0;
                            $two  = $two  + 0;
                            $one  = $one  + 0; 
                        }

                    }

                    $category[$key]->five = $five;
                    $category[$key]->four = $four;
                    $category[$key]->thre = $thre;
                    $category[$key]->two = $two;
                    $category[$key]->one = $one;
                    $category[$key]->rate =  ($five+$four+$thre+$two+$one)/5;
                }
            }



            // echo json_encode($category);



            // $result = array();
            foreach ($result as $k => $p) {

                // echo $k;
                $rowRate = [];
                $rowTitle = [];
                // $row = (object) array("data"=>"", "title"=>"");


                foreach($category as $key=>$come){
                    if ($p->id_page == $come->id_page) {
                        if ($key == 0 || $p->name == $come->name) {
                            // echo $key;
                            $rowRate = $come->rate;
                            $rowTitle = $come->name;
                        }else{
                            $rowRate = $rowRate.",". $come->rate;
                            $rowTitle = $rowTitle.",". $come->name;
                        }
                        // array_push($rowRate, $come->rate);
                        // array_push($rowTitle, $come->name);
                    }
                }

                $result[$k]->rate = $rowRate;
                $result[$k]->title = $rowTitle;
                // array_push($result, $row);

                // $result[$p->name] = $row;
            }


        }




        // echo json_encode($result);

        // $chartTotal = "";
        // $chartTitle = "";
        // foreach($result as $key=>$res){
        //     if ($key == 0) {
        //         $chartTotal = $res->total;
        //         $chartTitle = $res->answer;
        //     }else{
        //         $chartTotal = $chartTotal.",". $res->total;
        //         $chartTitle = $chartTitle.",". $res->answer;
        //     }
            
        // }
        // $resultTitle = $chartTitle;
        // $resultTotal = $chartTotal;
        // $result['answer'] =  $chartTitle;
        // $result['total'] = $chartTotal;
        // echo json_encode($result);
        




        // echo json_encode($comment->count());
        // dd($comment);

        return view('admin.download.report-download', compact('page','respondent', 'category','answer', 'comment', 'result'));
       
        // return view('admin.modal.report-modal', compact('category','answer','jawaban'));

    }


    public function StoreImage(Request $request)
    {

        // echo json_encode("jhello");
        // echo json_encode($request);


        $img = $request->img;
        $id_respondent = $request->id_respondent;
        // $type = $request->type;

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