<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="{{asset('foostart/css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>
        <script src="{{asset('foostart/js/jquery-1.11.0.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('foostart/js/bootstrap.js')}}" type="text/javascript"></script>

        <?php
        if (!class_exists('lessc')) {
            include ('foostart/libs/lessc.inc.php');
        }
        $less = new lessc;
        $less->compileFile('foostart/less/type-15.less', 'foostart/css/type-15.css');
        ?>
        <script src="{{asset('//cloud.tinymce.com/stable/tinymce.min.js')}}"></script>
        <link href="{{asset('foostart/css/nivo-slider.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('foostart/css/type-15.css')}}" rel="stylesheet" type="text/css"/>
        <script src="{{asset('foostart/js/jquery-migrate.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('foostart/js/jquery.nivo.slider.js')}}" type="text/javascript"></script>
        <script>
$(document).ready(function () {
    $("#abc").click(function () {
        $(".panel-body").slideToggle();
    });
     


});
        </script>

    </head>
    <body>


        <div class="type-15">

            <div class="container">

                <div class="title">
                    <h1>TIN TỨC</h1>
                </div>
                <div class="menu-category">
                    <ul>
                        <li class="current">

                            <a class="hovers_effect" href="#" title="TinTuc&SuKien">
                                <span class="hovers_text">Tin tức & sự kiện</span>
                            </a>
                        </li>
                        <li>
                            <a class="hovers_effect" href="#" title="TIn chuyen nghanh="hovers_text">Tin Chuyên Ngành</span>

                            </a>
                        </li>
                        <li>
                            <a class="hovers_effect" href="#" title="TIn khuyen mai="hovers_text">Tin khuyến mãi</span>

                            </a>
                        </li>
                    </ul>
                </div>
                <div class="a" style="width: 20%;float:right;">
                    <span id="abc" style="padding:3px;border: 2px solid #eee;float: right;">SEARCH</span>
                    <div class="panel panel-info" >


                        <div class="panel-body" style="display: none;">

                            {!! Form::open(['route' => 'post','method' => 'get']) !!}

                            <!--TITLE-->
                            <div class="form-group">
                                {!! Form::label('post_name', trans('post::post_admin.post_name_label')) !!}
                                {!! Form::text('post_name', @$params['post_name'], ['class' => 'form-control', 'placeholder' => trans('post::post_admin.post_name_placeholder')]) !!}
                            </div>
                            <!--/END TITLE-->

                            {!! Form::submit(trans('post::post_admin.search').'', ["class" => "btn btn-info pull-right"]) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="row" style="clear: both;">





                    <?php foreach ($posts as $post): ?>

                        <div class="col-md-3 col-sm-6 col-xs-12 ">





                            <div class="hinh">
                                <img src="foostart/images/type-15/1.jpg" alt=""/>
                            </div>

                            <div class="noidung"style="overflow: hidden;">
                                <a href="#"><?php echo $post['post_name'] ?></a>
                                <?php echo $post['post_noidung'] ?>.
                                <div class="viewmore"style="float:right;">
                                    <a href="http://fau.com.vn/10-nam-chan-nuoi-viet-nam-phat-trien-va-hoi-nhap.html" style="color:blue;">Xem thêm...</a>
                                </div>
                            </div>

                        </div>
                    <?php endforeach; ?>


                </div>   
            </div>
            <div class="clear"></div>
            <button id="myBtn" class="btn" style="margin-left: 45%;">ADD NEW POST</button>
            <!-- The Modal -->
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <p style="text-align: center;">HAVE YOU THINK BEFORE YOU DO ?</p>
                    {!! Form::open([ 'method' => 'post',
                    'route' => 'poster',
                    'id' => @$post->post_id,
                    'files'=>true])!!}
                    <!-- SAMPLE NAME TEXT-->
                    @include('post::post.elements.text', ['name' => 'post_name','noidung'=>'post_noidung'])
                    <!-- /END POST NAME TEXT -->



                    {!! Form::hidden('id',@$post->post_id) !!}

                    <!-- SAVE BUTTON -->
                    {!! Form::submit('Save', array("class"=>"btn btn-info pull-right ")) !!}
                    <!-- /SAVE BUTTON -->
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
        <script src="{{asset('foostart/js/front.js')}}" type="text/javascript"></script>


    </body>
</html>
