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
                                Pesan
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $no = 1 @endphp
                                @foreach($pesan as $p )
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{$p->nama}}</td>
                                        <td>{{$p->email}}</td>
                                        <td>
                                            <div style="width: 400px;overflow: hidden;display: inline-block;">
                                                {{str_limit($p->deskripsi,200)}}
                                            </div>
                                        </td>
                                        <td>
                                            <div style="width: 71px">
                                                {{$date1= date("d-m-Y",strtotime($p->tanggal))}}
                                            </div>
                                        </td>
                                        <td>
                                            <form action="{{ route('pesan.destroy', $p->id_pesan) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <a href="{{ route('pesan.edit',$p->id_pesan) }}" class=" btn btn-sm btn-primary">Kirim Pesan</a>
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