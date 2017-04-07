
                            {!! Form::open(['route'=>['post.post', 'id' => @$post->post_id],  'files'=>true, 'method' => 'post'])  !!}
                            <!--END POST ID  -->

                            <!-- POST NAME TEXT-->
                            @include('post::post.elements.text', ['name' => 'post_name','noidung'=>'post_noidung'])
                            <!-- /END POST NAME TEXT -->
                            
                            
                            
                            {!! Form::hidden('id',@$post->post_id) !!}
                            
                            <!-- DELETE BUTTON -->
                            <a href="{!! URL::route('post.delete',['id' => @$post->id, '_token' => csrf_token()]) !!}"
                               class="btn btn-danger pull-right margin-left-5 delete">
                                Delete
                            </a>
                            <!-- DELETE BUTTON -->

                            <!-- SAVE BUTTON -->
                            {!! Form::submit('Save', array("class"=>"btn btn-info pull-right ")) !!}
                            <!-- /SAVE BUTTON -->

                            {!! Form::close() !!}
     \