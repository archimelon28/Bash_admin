@extends('base')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Informasi</h2>
            </div>
            <!-- Input -->
            <form action="{{route('informasi.update',$Informasi->id_informasi)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row clearfix">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>Nama Perusahaan</h2>
                                </div>
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" value="{{$Informasi->nama_pt}}" name="nama_pt" />
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
                                    <h2>Alamat</h2>
                                </div>
                                <div class="body">
                                    <h2 class="card-inside-title"></h2>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea class="form-control" id="summary-ckeditor" name="alamat">{{$Informasi->alamat}}</textarea>
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
                                    <h2>Telepon</h2>
                                </div>
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" value="{{$Informasi->telepon}}" name="telepon" />
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
                                <h2>Email</h2>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="{{$Informasi->email}}" name="email" />
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
                                <h2>Longtitude</h2>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="{{$Informasi->longt}}" name="longt" />
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
                                <h2>Latitude</h2>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="{{$Informasi->lat}}" name="lat" />
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
                                <h2>About</h2>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="{{$Informasi->about}}" name="about" />
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
                                        Logo
                                    </h2>
                                </div>
                                <div class="body">
                                    <form action="/" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                                        <div class="fallback">
                                            <img src="..\..\assets\images\upload\catering\logo\{{$Informasi->logo}}" style="height: 100px;width: 100px">
                                        </div>
                                    </form>
                                </div>
                                <div class="form-group">
                                    <label for="email">File:</label>
                                    <input name="logo" type="file"/>
                                    <div style="text-align: right">
                                                <button type="submit" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float">
                                                    <i class="material-icons">save</i>
                                                </button>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </section>
@endsection