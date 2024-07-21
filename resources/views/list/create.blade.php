@extends('layout.main')

@section('content')
<div
    class="row justify-content-center align-items-center g-2"
>
    <div class="col-auto">
        <h2>Create Schadule</h2>
    </div>
    <div class="col-12 col-lg-9">
        <form action="{{route('list.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Task</label>
                <input value="{{old('judul')}}" type="text" class="form-control" name="judul" id="judul" placeholder="Fill this the task" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date</label>
                <input  value="{{old('tanggal')}}" type="datetime-local" class="form-control" name="tanggal" id="tanggal" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Fill this with task description" required>{{old('deskripsi')}}</textarea>
            </div>
            <div>
                <div
                    class="row justify-content-end gap-3"
                >
                    <div class="col-auto">
                        <a href="{{route('list.index')}}" class="btn btn-secondary">Cencel</a>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary px-4">Add</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
