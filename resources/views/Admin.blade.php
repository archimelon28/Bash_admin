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
                                Admin
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="{{route('admin.create')}}" methods="post">
                                        <i class="material-icons">account_box</i>
                                        <span>Tambah Admin</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Roles</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $no = 1 @endphp
                                @foreach($admin as $a)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{$a->nama}}</td>
                                        <td>{{$a->username}}</td>
                                        <td> @php if($a->roles == 1)
                                            {
                                                echo "Super Admin";
                                            }else if ($a->roles == 2)
                                            {
                                                echo "Admin";
                                            }
                                            @endphp</td>
                                        <td>@php if($a->isAktif == 1)
                                            {
                                                echo "Aktif";
                                            } else if ($a->isAktif == 2)
                                            {
                                                echo  "Tidak Aktif";
                                            }
                                            @endphp</td>
                                        <td>

                                            <form action="{{ route('admin.destroy', $a->id_admin) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <a href="{{ route('admin.edit',$a->id_admin) }}" class=" btn btn-sm btn-primary">Update</a>
                                                @php if($a->isAktif == 1)
                                              {
                                                @endphp
                                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin mengarsip data?')">Arsip</button>
                                                @php
                                                    } else if($a->isAktif == 2)
                                                    {
                                                @endphp
                                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin mengarsip data?')">Aktif</button>
                                                @php
                                                    }
                                                @endphp
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