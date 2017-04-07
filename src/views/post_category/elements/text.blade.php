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
<div class="form-group">
    <!-- POST NAME -->
    <?php $post_category_name = $request->get('post_titlename') ? $request->get('post_name') : @$post->post_category_name ?>
    {!! Form::label($name, trans('post::post_admin.name').':') !!}
    {!! Form::textarea($name, $post_category_name, ['class' => 'form-control', 'placeholder' => trans('post::post_admin.name').'']) !!}
   <!-- /POST NAME -->
</div>
