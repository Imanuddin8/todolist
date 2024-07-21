@extends('layout.main')

@section('content')
<div>
    <h2 class="mb-4">To Do List</h2>
    <p>list of things to do today!!</p>
</div>
<div class="row g-3">
    @foreach ($todolist as $row)
        <div class="col-12 col-lg-4">
            <div class="bg-primary text-white rounded p-3 card-margin">
                <h3>{{$row->judul}}</h3>
                <p>{{$row->deskripsi}}</p>
                <p>{{formatDate($row->tanggal)}}</p>
                <div class="d-flex justify-content-end">
                    @if (!$row->status)
                        <form action="{{route('todo.selesai', $row->id)}}" method="POST">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-warning">Mark as Completed</button>
                        </form>
                    @else
                    <div class="text-warning">
                        Finished
                    </div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
