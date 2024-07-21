@extends('layout.main')

@section('content')
<div
    class="row justify-content-center align-items-center g-2"
>
    <div class="col-auto">
        <h2>Create Schadule</h2>
    </div>
    <div class="col-12 col-lg-9">
        <form action="{{route('list.update', $todolist->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="judul" class="form-label">Task</label>
                <input value="{{$todolist->judul}}" type="text" class="form-control" name="judul" id="judul" placeholder="Fill this the task" required>
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Date</label>
                <input value="{{$todolist->tanggal}}" type="datetime-local" class="form-control" name="tanggal" id="tanggal" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Description</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Fill this with task description" required>{{$todolist->deskripsi}}</textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="checkbox" id="status" name="status" {{$todolist->status ? 'checked' : ''}}>
            </div>
            <div>
                <div
                    class="row justify-content-end gap-3"
                >
                    <div class="col-auto">
                        <a href="{{route('list.index')}}" class="btn btn-secondary">Cencel</a>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-warning px-4">Edit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
