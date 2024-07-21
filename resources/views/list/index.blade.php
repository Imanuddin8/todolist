@extends('layout.main')

@section('content')
<div>
    <h2 class="mb-4">Schedule Your Activities</h2>
    <p>List your activity schedule<br>Click add button to add your schedule!</p>
</div>
<div>
    <div class="mb-3">
        <form action="{{route('list.filter')}}" method="GET">
            <div
                class="row justify-content-start align-items-center"
            >
                <div class="col-auto">
                    Search
                </div>
                <div class="col-auto">
                    <input type="date" class="form-control" name="awal" id="awal">
                </div>
                -
                <div class="col-auto">
                    <input type="date" class="form-control" name="akhir" id="akhir">
                </div>
                /
                <div class="col-auto">
                    <input type="search" class="form-control" name="cari" id="cari" placeholder="Name of task">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn bg-secondary">
                        <i class="fa-solid fa-search text-white"></i>
                    </button>
                </div>
                @if (request()->has('awal') || request()->has('cari'))
                    <div class="col-auto">
                        <a href="{{route('list.index')}}" class="btn bg-secondary">
                            <i class="fa fa-arrows-rotate text-white"></i>
                        </a>
                    </div>
                @endif
            </div>
        </form>
    </div>
    <div class="mb-3">
        <a href="{{route('list.create')}}" class="btn btn-primary px-4">
            <i class="fa-solid fa-plus"></i>
            <span>Add</span>
        </a>
    </div>
    <div>
        <table class="table table-striped">
            <head>
                <tr class="fw-bold">
                    <td>Task</td>
                    <td>Date</td>
                    <td>Description</td>
                    <td>Action</td>
                    <td>Edit/Delete</td>
                </tr>
            </head>
            <body>
                @if ($todolist->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center">
                            <span>No Schedule!!</span>
                        </td>
                    </tr>
                @else
                    @foreach ($todolist as $row )
                        <tr>
                            <td>{{$row->judul}}</td>
                            <td>{{formatDate($row->tanggal)}}</td>
                            <td>{{$row->deskripsi}}</td>
                            <td>
                                @if (!$row->status)
                                    <form action="{{route('list.selesai', $row->id)}}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-success btn-sm">Mark as Completed</button>
                                    </form>
                                @else
                                <div class="text-success">
                                    Finished
                                </div>
                                @endif
                            </td>
                            <td class="d-flex">
                                <a href="{{route('list.edit', $row->id)}}" class="btn btn-warning mr-2">
                                    <i class="fa-solid fa-edit text-white"></i>
                                </a>
                                <form method="POST" action="{{route('list.delete', $row->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </body>
        </table>
    </div>
</div>

@endsection
