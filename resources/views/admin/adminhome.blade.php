<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="container py-6">
        <div class="alert alert-info" role="alert">
            {{ __("You're logged as Admin!") }}
        </div>
    </div>

    <div class="admin-wrapper">

        <!-- LEFT -->
        <div class="admin-wrapper-left">
            <button class="menu-item">Отзывы</button>
        </div>

        <!-- RIGHT -->
        <div>
            @foreach ($reviews as $review)
                <div class="border p-3 m-3">
                    <h2 class="mb-2">{{ $review->name }}</h2>
                    <p class="mb-2">{{ $review->email }}</p>
                    <p class="mb-2">{{ $review->massage }}</p>
                    <a href="{{ route('review-edit', $review->id) }}" class="btn btn-success">Редактировать</a>
                    <a href="{{ route('home-review-delete', $review->id) }}" class="btn btn-danger">Удалить</a>
                </div>
            @endforeach
        </div>
        
    </div>    
    

</x-app-layout>