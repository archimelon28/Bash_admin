@extends('base')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Slide</h2>
            </div>
            <!-- Input -->
            <form action="{{route('slide.update',$Slide->id_slide)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row clearfix">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>Judul</h2>
                                </div>
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" value="{{$Slide->judul}}" name="judul" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>Deskripsi</h2>
                                </div>
                                <div class="body">
                                    <h2 class="card-inside-title"></h2>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea class="form-control" id="summary-ckeditor" name="deskripsi">{{$Slide->deskripsi}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        Foto lama
                                    </h2>
                                </div>
                                <div class="body">
                                    <form action="/" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                                        <div class="fallback">
                                            <img src="..\..\assets\images\upload\catering\slide\{{$Slide->gambar}}" style="height: 100px;width: 100px">
                                        </div>
                                    </form>
                                </div>
                                <div class="form-group">
                                    <label for="email">File:</label>
                                    <input name="gambar" type="file"/>
                                </div>
                                <button type="submit" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float">
                                    <i class="material-icons">save</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </section>
@endsection