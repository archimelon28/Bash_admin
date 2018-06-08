@extends('base')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
            </div>
            <!-- Basic Table -->
@if(Session::has('alert-success'))
                <div class="alert alert-success">
                    <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                </div>
            @endif
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Layanan
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="{{route('layanan.create')}}" methods="post">
                                        <i class="material-icons">group</i>
                                        <span>Tambah layanan</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $no = 1 @endphp
                                @foreach($layanan as $l)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{$l->judul}}</td>
                                        <td>{{$l->deskripsi}}</td>
                                        <td><img src="bash_profile/uploads/layanan/{{$l->gambar}}" style="height: 100px;width: 100px"></td>
                                        <td>@php if($l->isAktif == 1)
                                            {
                                                echo "Aktif";
                                            } else if ($l->isAktif == 2)
                                            {
                                                echo  "Tidak Aktif";
                                            }
                                            @endphp
                                        </td>
                                        <td>
                                            <form action="{{ route('layanan.destroy', $l->id_layanan) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <a href="{{ route('layanan.edit',$l->id_layanan) }}" class=" btn btn-sm btn-primary">Update</a>
                                                @php if($l->isAktif == 1)
                                                    {
                                                @endphp
                                                <button class="btn btn-sm btn-danger" type="submit" name="Aktif" value="Aktif" onclick="return confirm('Yakin ingin mengarsip data?')">Arsip</button>
                                                @php
                                                    } else if($l->isAktif == 2)
                                                    {
                                                @endphp
                                                <button class="btn btn-sm btn-danger" type="submit" name="Aktif" value="Aktif" onclick="return confirm('Yakin ingin mengarsip data?')">Aktif</button>
                                                @php
                                                    }
                                                @endphp
                                                <button class="btn btn-sm btn-danger" name="Hapus" type="submit" value="Hapus" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection