@extends('layout')

@section('title')
    Отзывы 
@endsection

{{-- TODO сделать кнопку "добавить отзывы", сама форма в модальном окне   --}}

@section('main_content')
    <h1>Отзывы. Работа с формой</h1>
    <br>
    <hr>
    <br>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    <br>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2>Форма добавления отзыва</h2>
    <hr>
    <form method="POST" action="{{route('reviews-check')}}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Введите ваше имя">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email адрес</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Сообщение</label>
            <textarea class="form-control" name="massage" id="massage" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Отправить отзывы</button>
    </form>

    <br>
    <hr>

    <h2>Все отзывы</h2>
    <br>
    <ul class="grid grid-cols-2 gap-5">
        @foreach ($reviews as $el)
            <div class="col alert alert-warning m-0">
                <h3 class="font-bold mb-3 text-lg">{{ $el->name }}</h3>
                <p>{{ $el->email }}</p>
                <p class="py-4">{{ $el->massage }}</p>

                <a href="{{ route('review', $el->id) }}" class="btn btn-success">Подробнее</a>
            </div>
        @endforeach
    </div>
    <div class="p-7">
        {{$reviews->links()}}
    </div>

@endsection