<?php

namespace Foostart\Post\Models;

use Illuminate\Database\Eloquent\Model;

class PostsCategories extends Model {

    protected $table = 'posts_categories';
    public $timestamps = false;
    protected $fillable = [
        'post_category_name'
    ];
    protected $primaryKey = 'post_category_id';

    public function get_posts_categories($params = array()) {
        $eloquent = self::orderBy('post_category_id');

        if (!empty($params['post_category_name'])) {
            $eloquent->where('post_category_name', 'like', '%'. $params['post_category_name'].'%');
        }
        $posts_category = $eloquent->paginate(10);
        return $posts_category;
    }

    /**
     *
     * @param type $input
     * @param type $post_id
     * @return type
     */
    public function update_post($input, $post_id = NULL) {

        if (empty($post_id)) {
            $post_id = $input['post_category_id'];
        }

        $post = self::find($post_id);

        if (!empty($post)) {

            $post->post_category_name = $input['post_category_name'];

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
                    'post_category_name' => $input['post_category_name'],
        ]);
        return $post;
    }
}
