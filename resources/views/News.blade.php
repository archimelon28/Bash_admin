@extends('base')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Berita
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="{{route('berita.create')}}" methods="post">
                                        <i class="material-icons">assignment</i>
                                        <span>Tambah berita</span>
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
                                    <th>Isi</th>
                                    <th>Tanggal</th>
                                    <th>Gambar</th>
                                    <th>Status</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $no = 1 @endphp
                                @foreach($berita as $b)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>
                                            <div style="width: 100px;overflow: hidden;display: inline-block;">
                                                {{$b->judul}}
                                            </div>
                                        <td>
                                            <div style="width: 400px;overflow: hidden;display: inline-block;">
                                                {{str_limit($b->isi,200)}}
                                            </div>
                                        </td>
                                        <td>
                                            <div style="width: 71px">
                                                {{$date1= date("d-m-Y",strtotime($b->tanggal))}}
                                            </div>
                                        </td>
                                        <td><img src="assets/images/upload/catering/berita/{{$b->gambar_utama}}" style="height: 100px;width: 100px"></td>
                                        <td>@php if($b->isAktif == 1)
                                            {
                                                echo "Aktif";
                                            } else if ($b->isAktif == 2)
                                            {
                                                echo  "Tidak Aktif";
                                            }
                                            @endphp
                                        </td>
                                        <td>{{$b->nama}}</td>
                                        <td>
                                            <form action="{{ route('berita.destroy', $b->id_news) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <a href="{{ route('berita.edit',$b->id_news) }}" class=" btn btn-sm btn-primary">Update</a>
                                                @php if($b->isAktif == 1)
                                                {
                                                @endphp
                                                <button class="btn btn-sm btn-danger" type="submit" name="Aktif" value="Aktif" onclick="return confirm('Yakin ingin mengarsip data?')">Arsip</button>
                                                @php
                                                    } else if($b->isAktif == 2)
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