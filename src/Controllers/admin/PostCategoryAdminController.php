<?php namespace Foostart\Post\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use Route,
    Redirect;
use Foostart\Post\Models\PostsCategories;
/**
 * Validators
 */
use Foostart\Post\Validators\PostCategoryAdminValidator;

class PostCategoryAdminController extends Controller {

    public $data_view = array();

    private $obj_post_category = NULL;
    private $obj_validator = NULL;

    public function __construct() {
        $this->obj_post_category = new PostsCategories();
    }

    /**
     *
     * @return type
     */
    public function index(Request $request) {

         $params =  $request->all();

        $list_post_category = $this->obj_post_category->get_posts_categories($params);

        $this->data_view = array_merge($this->data_view, array(
            'posts_categories' => $list_post_category,
            'request' => $request,
            'params' => $params
        ));
        return view('post::post_category.admin.post_category_list', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function edit(Request $request) {

        $post = NULL;
        $post_id = (int) $request->get('id');
        

        if (!empty($post_id) && (is_int($post_id))) {
            $post = $this->obj_post_category->find($post_id);

        }

        $this->data_view = array_merge($this->data_view, array(
            'post' => $post,
            'request' => $request
        ));
        return view('post::post_category.admin.post_category_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function post(Request $request) {

        $this->obj_validator = new PostCategoryAdminValidator();

        $input = $request->all();

        $post_id = (int) $request->get('id');

        $post = NULL;

        $data = array();

        if (!$this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($post_id) && is_int($post_id)) {

                $post = $this->obj_post_category->find($post_id);
            }

        } else {
            if (!empty($post_id) && is_int($post_id)) {

                $post = $this->obj_post_category->find($post_id);

                if (!empty($post)) {

                    $input['post_category_id'] = $post_id;
                    $post = $this->obj_post_category->update_post($input);

                    //Message
                    \Session::flash('message', trans('post::post_admin.message_update_successfully'));
                    return Redirect::route("admin_post_category.edit", ["id" => $post->post_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('post::post_admin.message_update_unsuccessfully'));
                }
            } else {

                $post = $this->obj_post_category->add_post($input);

                if (!empty($post)) {

                    //Message
                    \Session::flash('message', trans('post::post_admin.message_add_successfully'));
                    return Redirect::route("admin_post_category.edit", ["id" => $post->post_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('post::post_admin.message_add_unsuccessfully'));
                }
            }
        }

        $this->data_view = array_merge($this->data_view, array(
            'post' => $post,
            'request' => $request,
        ), $data);

        return view('post::post_category.admin.post_category_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function delete(Request $request) {

        $post = NULL;
        $post_id = $request->get('id');

        if (!empty($post_id)) {
            $post = $this->obj_post_category->find($post_id);

            if (!empty($post)) {
                  //Message
                \Session::flash('message', trans('post::post_admin.message_delete_successfully'));

                $post->delete();
            }
        } else {

        }

        $this->data_view = array_merge($this->data_view, array(
            'post' => $post,
        ));

        return Redirect::route("admin_post_category");
    }

}