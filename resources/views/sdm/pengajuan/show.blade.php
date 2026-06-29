@extends('layouts.sdm')

@section('title','Detail Pengajuan')

@section('content')

<div class="page-title mb-4">

    <h2>Detail Pengajuan Magang</h2>

    <p>Informasi lengkap mahasiswa.</p>

</div>

<div class="row">

    <div class="col-lg-8">

        <div class="card dashboard-card">

            <div class="card-header">

                Biodata Mahasiswa

            </div>

            <div class="card-body">

                <table class="table">

                    <tr>
                        <th width="200">Nama</th>
                        <td>{{ $pengajuan->nama }}</td>
                    </tr>

                    <tr>
                        <th>Universitas</th>
                        <td>{{ $pengajuan->universitas }}</td>
                    </tr>

                    <tr>
                        <th>Jurusan</th>
                        <td>{{ $pengajuan->jurusan }}</td>
                    </tr>

                    <tr>
                        <th>Unit Tujuan</th>
                        <td>{{ $pengajuan->unit_tujuan }}</td>
                    </tr>

                    <tr>
                        <th>Tanggal Pengajuan</th>
                        <td>{{ $pengajuan->tanggal_pengajuan }}</td>
                    </tr>

                    <tr>
                        <th>Status</th>

                        <td>

                            <span class="badge bg-warning">

                                {{ $pengajuan->status }}

                            </span>

                        </td>

                    </tr>

                </table>

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="card dashboard-card">

            <div class="card-header">

                Aksi SDM

            </div>

            <div class="card-body d-grid gap-2">

                <button class="btn btn-success">

                    <i class="fa fa-check"></i>

                    Terima

                </button>

                <button class="btn btn-warning">

                    <i class="fa fa-rotate-left"></i>

                    Minta Revisi

                </button>

                <button class="btn btn-danger">

                    <i class="fa fa-times"></i>

                    Tolak

                </button>

            </div>

        </div>

    </div>

</div>

@endsection