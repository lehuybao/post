
<head>
  <script src='//cloud.tinymce.com/stable/tinymce.min.js'></script>
  <script>
  tinymce.init({
    selector: 'textarea',  // change this value according to your HTML
  plugin: 'a_tinymce_plugin',
  a_plugin_option: true,
  a_configuration_option: 400
  });
  </script>
</head>
<!-- POST NAME -->
<div class="form-group">
    <?php $post_name = $request->get('post_titlename') ? $request->get('post_name') : @$post->post_name ?>
    {!! Form::label($name, trans('post::post_admin.name').':') !!}
    {!! Form::textarea($name, $post_name, ['class' => 'form-control', 'placeholder' => trans('post::post_admin.name').'']) !!}

     <?php $post_noidung = $request->get('post_titlenoidung') ? $request->get('post_noidung') : @$post->post_noidung ?>
    {!! Form::label($noidung, trans('post::post_admin.noidung').':') !!}
    {!! Form::textarea($noidung, $post_noidung, ['class' => 'form-control', 'placeholder' => trans('post::post_admin.noidung').'']) !!}
</div>
<!-- /POST NAME -->