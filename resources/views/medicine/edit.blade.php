@extends('layouts.template')

@section('content')
    <form action="{{ route('medicine.update', $medicine['id']) }}" method="POST" class="card p-5">

        @csrf
        @method('PATCH')
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif


        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama Obat: </label>
            <div class="col-sm-10">
                <input type="text" name="name" id="name" value="{{ $medicine['name'] }}" class="form-control">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="type" class="col-sm-2 col-form-label">Jenis Obat: </label>
            <div class="col-sm-10">
                <select name="type" id="type" class=" form-control">
                    <option selected disabled hidden>--Pilih--</option>
                    <option value="tablet" {{ $medicine['type'] == 'tablet' ? 'selected' : '' }}>Tablet</option>
                    <option value="sirup" {{ $medicine['type'] == 'sirup' ? 'selected' : '' }}>Sirup</option>
                    <option value="kapsul" {{ $medicine['type'] == 'kapsul' ? 'selected' : '' }}>Kapsul</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Harga Obat: </label>
            <div class="col-sm-10">
                <input type="number" name="price" id="price" value="{{ $medicine['price'] }}" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
    </form>
@endsection
