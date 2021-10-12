<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Base\Animation;
use App\Model\Base\Image;
use App\Model\Base\LinkVideo;
use App\Model\Base\Presentation;
use App\Model\Base\Text;
use App\Model\Base\Video;
use App\Model\Lesson;
use App\Model\LessonHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommonController extends Controller
{
    public function index()
    {
    }
    public function images()
    {
        $images = Image::all();
        return $images;
    }
    public function videos()
    {
        $videos = Video::all();
        return $videos;
    }
    public function texts()
    {
        $texts = Text::all();
        return $texts;
    }
    public function animations()
    {
        $animations = Animation::all();
        return $animations;
    }
    public function presentations()
    {
        $presentations = Presentation::all();
        return $presentations;
    }
    public function linkvideos()
    {
        $linkvideos = LinkVideo::all();
        return $linkvideos;
    }
    public function lessons()
    {
        $projects = Lesson::all();
        return $projects;
    }
    public function recentLessons()
    {
        $lessons = Lesson::where('user_id', Auth::user()->id)->get()->sortByDesc('id')->values()->take(8);
        return $lessons;
    }
    public function createLesson(Request $request)
    {

        $lesson = new Lesson();
        $lesson->content = json_encode($request->all());
        $lesson->save();

        return $request->all();
    }
    public function updateLesson(Request $request, $id)
    {
        Lesson::where('id', $id)->update(['content' => json_encode($request->all())]);
        return $request;
    }
    public function getLessonById($id)
    {
        $lesson = Lesson::find($id);
        return $lesson;
    }
    public function createLessonHistory(Request $request)
    {

        $history = new LessonHistory();
        $history->lesson_id = $request->id;
        $history->title = $request->title;
        $history->content = json_encode($request->all());
        $history->save();

        return $request->all();
    }
    public function viewLessonHistory()
    {
        $history = LessonHistory::where('user_id', Auth::user()->id)->get();
        return $history;
    }
    public function getLessonHistoryById($id)
    {
        $history = LessonHistory::find($id);
        return $history;
    }
    public function uploadResources(Request $request)
    {
        if ($request->hasFile('file')) {

            $file = $request->file('file');

            $extension = $file->getClientOriginalExtension();

            $image_extensions = ['gif', 'jpg', 'jpeg', 'bmp', 'png'];
            $video_extensions = ['avi', 'mp4'];

            if (in_array($extension, $image_extensions)) {
                $destinationPath = 'images';
                $file->move($destinationPath, $file->getClientOriginalName());

                $image = new Image();
                $image->name = $file->getClientOriginalName();
                $image->src = "/" . $destinationPath . "/" . $file->getClientOriginalName();
                $image->type = 'image';

                $image->save();
            }

            if (in_array($extension, $video_extensions)) {
                $destinationPath = 'videos';
                $file->move($destinationPath, $file->getClientOriginalName());

                $video = new Video();
                $video->name = $file->getClientOriginalName();
                $video->src = "/" . $destinationPath . "/" . $file->getClientOriginalName();
                $video->type = 'video';

                $video->save();
            }

            return "ok";
        }
    }
}
