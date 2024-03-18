<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{
    public function group(){

        return view('group');
    }

    public function save_group(Request $request){
        $access_token = "c5af9ecfc5af9ecfc5af9ecf6fc5d61d3fcc5afc5af9ecfa4fb157ec8dde9ad599f577f";

        $group_id = $request->group_id;

        $apiLink = "https://api.vk.ru/method/wall.get?access_token=" . $access_token . "&domain=" . $group_id . "&count=100&filter=all&v=5.199";

        $result = json_decode(file_get_contents($apiLink));

        foreach ($result->response->items as $item){
            $likes = $item->likes->count;
            $comments = $item->comments->count;
            $post_id = $item->id;
            $owner_id = $item->owner_id;
            $reposts = $item->reposts->count;
            $text = $item->text;
            if (isset($item->attachments[0]->photo))
                $photo = $item->attachments[0]->photo->sizes[count($item->attachments[0]->photo->sizes) - 1]->url;
            else
                $photo = NULL;
            $link = "https://vk.com/" . $group_id . "?w=wall" . $owner_id . "_" . $post_id;

            DB::table('post_content')->insert(['owner_id' =>$owner_id, 'group_id' =>$group_id, 'post_id' => $post_id, 'text' => $text, 'photo' => $photo, 'like' =>$likes, 'comments' =>$comments, 'reposts' => $reposts, 'link' => $link]);
        }

        $items = DB::table('post_content')->select('*')->where('group_id', '=', $group_id)->take('100')->get();

        return view('cards', ['items' => $items]);

    }
}
