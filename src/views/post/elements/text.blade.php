
<head>
 
</head>
<!-- POST NAME -->
<div class="form-group">
    <?php $post_name = $request->get('post_titlename') ? $request->get('post_name') : @$post->post_name ?>
    {!! Form::label($name, trans('post::post.name').':') !!}
    {!! Form::text($name, $post_name, ['class' => 'form-control', 'placeholder' => trans('post::post.name').'']) !!}

     <?php $post_noidung = $request->get('post_titlenoidung') ? $request->get('post_noidung') : @$post->post_noidung ?>
    {!! Form::label($noidung, trans('post::post.noidung').':') !!}
    {!! Form::text($noidung, $post_noidung, ['class' => 'form-control', 'placeholder' => trans('post::post.noidung').'']) !!}
</div>
<!-- /POST NAME -->