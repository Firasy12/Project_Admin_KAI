@extends('layouts.sdm')

@section('title','Pengajuan Magang')

@section('content')

<div class="page-title mb-4">

<div class="row mb-4">

    <div class="col-md-3">

        <div class="mini-card">

            <span>Total Pengajuan</span>

            <h3>{{ $pengajuan->total() }}</h3>

        </div>

    </div>

    <div class="col-md-3">

        <div class="mini-card warning">

            <span>Menunggu</span>

            <h3>
                {{ App\Models\Pengajuan::where('status','Menunggu')->count() }}
            </h3>

        </div>

    </div>

    <div class="col-md-3">

        <div class="mini-card info">

            <span>Review</span>

            <h3>
                {{ App\Models\Pengajuan::where('status','Review')->count() }}
            </h3>

        </div>

    </div>

    <div class="col-md-3">

        <div class="mini-card success">

            <span>Diterima</span>

            <h3>
                {{ App\Models\Pengajuan::where('status','Diterima')->count() }}
            </h3>

        </div>

    </div>

</div>

<div class="row mb-3">

    <div class="col-md-6">

        <input

            type="text"

            id="searchInput"

            class="form-control"

            placeholder="Cari mahasiswa..."

        >

    </div>

    <div class="col-md-3">

        <select

            id="statusFilter"

            class="form-select">

            <option value="">Semua Status</option>

            <option>Menunggu</option>

            <option>Review</option>

            <option>Diterima</option>

            <option>Ditolak</option>

        </select>

    </div>

    <div class="col-md-3 text-end">

        <button class="btn btn-primary">

            <i class="fa fa-filter"></i>

            Filter

        </button>

    </div>

</div>

    <h2>Pengajuan Magang</h2>

    <p>Kelola seluruh data pengajuan mahasiswa.</p>

</div>

<div class="card dashboard-card">

    <div class="card-header d-flex justify-content-between">

        <h5>Daftar Pengajuan</h5>

        <a href="#" class="btn btn-primary">

            <i class="fa fa-plus"></i>

            Tambah Pengajuan

        </a>

    </div>

    <div class="card-body">

        <table id="pengajuanTable"
        class="table table-hover align-middle">

            <thead>

            <tr>

                <th>No</th>

                <th>Nama</th>

                <th>Universitas</th>

                <th>Jurusan</th>

                <th>Unit</th>

                <th>Status</th>

                <th>Aksi</th>

            </tr>

            </thead>

            <tbody>

            @foreach($pengajuan as $item)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $item->nama }}</td>

                <td>{{ $item->universitas }}</td>

                <td>{{ $item->jurusan }}</td>

                <td>{{ $item->unit_tujuan }}</td>

                <td>

                    @if($item->status=='Menunggu')

                        <span class="badge rounded-pill bg-warning text-dark">

                            Menunggu

                        </span>

                    @elseif($item->status=='Review')

                        <span class="badge rounded-pill bg-primary">

                            Review

                        </span>

                    @elseif($item->status=='Diterima')

                        <span class="badge rounded-pill bg-success">

                            Diterima

                        </span>

                    @else

                        <span class="badge rounded-pill bg-danger">

                            Ditolak

                        </span>

                    @endif

                </td>

                <td>

                    <a href="{{ route('sdm.pengajuan.show', $item->id) }}"
                       class="btn btn-primary btn-action">

                        <i class="fa fa-eye"></i>

                    </a>

                    <a href="#"
                       class="btn btn-warning btn-action">

                        <i class="fa fa-pen"></i>

                    </a>

                    <a href="#"
                       class="btn btn-danger btn-action">

                        <i class="fa fa-trash"></i>

                    </a>

                </td>

            </tr>

            @endforeach

            </tbody>

        </table>

        <div class="mt-3">

            {{ $pengajuan->links() }}

        </div>

    </div>

</div>

@endsection