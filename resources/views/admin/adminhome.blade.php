<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged as Admin!") }}
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-5">
                <div class="col-4">
                    <div class="alert alert-success mt-6">
                        <a class="link-success" href="/home/reviews">Редактировать отзывы</a>
                    </div>
                </div>
                <div class="col-8">col-4</div>
            </div>

        </div>
    </div>

</x-app-layout>