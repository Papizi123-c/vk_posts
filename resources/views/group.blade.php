@extends('main')

@section('content')
    @vite(['resources/js/requests.js'])
    <div class="container">
        <div class="li p-3 m-3 row justify-content-center">
                <form class="postForm col-4" id="postForm">
                    <label for="link_group" class="form-label">Ссылка на группу</label>
                    <input type="text" class="form-control" id="link_group" name="link-group">
                    <button class="btn btn-primary mt-2" id="submit">Найти</button>
                </form>
        </div>
    </div>
    @vite('resources/js/requests.js')
    <div class="container">
        <div class="row" id="cont1">
        </div>
    </div>
@endsection
