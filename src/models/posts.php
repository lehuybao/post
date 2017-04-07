<?php

namespace Foostart\Post\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model {

    protected $table = 'posts';
    public $timestamps = false;
    protected $fillable = [
        'post_name',
        'post_noidung'
    ];
    protected $primaryKey = 'post_id';

    /**
     *
     * @param type $params
     * @return type
     */
    public function get_posts($params = array()) {
        $eloquent = self::orderBy('post_id');

        //post_name
        if (!empty($params['post_name'])) {
            $eloquent->where('post_name', 'like', '%' . $params['post_name'] . '%');
        }

        $posts = $eloquent->paginate(10); //TODO: change number of item per page to configs

        return $posts;
    }

    /**
     *
     * @param type $input
     * @param type $post_id
     * @return type
     */
    public function update_post($input, $post_id = NULL) {

        if (empty($post_id)) {
            $post_id = $input['post_id'];
        }

        $post = self::find($post_id);

        if (!empty($post)) {

            $post->post_name = $input['post_name'];
            $post->post_noidung = $input['post_noidung'];

            $post->save();

            return $post;
        } else {
            return NULL;
        }
    }

    /**
     *
     * @param type $input
     * @return type
     */
    public function add_post($input) {

        $post = self::create([
                    'post_name' => $input['post_name'],
                    'post_noidung' => $input['post_noidung'],
        ]);
        return $post;
    }

}
