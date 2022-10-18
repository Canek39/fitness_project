@extends('layouts.main')
@section('title')
    Список тренеров @parent
@endsection
@section('content')
    <div class="dropdown body_back p-3 d-flex justify-content-center">
        <button class="btn btn-outline-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Категории тренировок
        </button>
        <div class="tags_box body_back dropdown-menu">
            <div class="container">
                <div class="body_back p-4">
                    @if (!request()->is('*/0'))
                        <a class="btn btn-outline-success" href="{{ route('trainers.index', ['tag_id' => 0]) }}">
                            Все категории
                        </a>
                    @endif
                    @foreach ($tags as $tag)
                        <a class="btn btn-outline-secondary @if (request()->is("*/$tag->id")) active @endif"
                            href="{{ route('trainers.index', ['tag_id' => $tag->id]) }}">
                            {{ $tag->tag }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container marketing">
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading fw-normal lh-1">Список фитнес-тренеров</h2>
                <p class="lead">Здесь можно ознакомиться с анкетами, получить подробную информацию и контактные данные
                    о
                    каждом фитнес-тренере</p>
            </div>
        </div>
        <hr class="featurette-divider">
        <!-- Three columns of text below the carousel -->
        <div class="trainers_box">
            @forelse($trainersList as $key => $trainer)
                <div class="item_box">
                    <img src="{{ $trainer->profile->image }}" class="bd-placeholder-img trainers_image" alt="img">
                    <h2 class="fw-normal trainers_name">{{ $trainer->profile->first_name }}
                        {{ $trainer->profile->last_name }}</h2>
                    <p>Возраст: {{ $trainer->profile->age }} {{ $trainerBuilder->getUnitCase($trainer->profile->age) }}</p>
                    <p>Опыт: {{ $trainer->skill->experience }}
                        {{ $trainerBuilder->getUnitCase($trainer->skill->experience) }}</p>
                    <p>Город: {{ $trainer->skill->location }}</p>
                    <p>Категории тренировок:</p>
                    <div class="d-flex flex-wrap flex-grow-1 align-items-start">
                        @forelse($trainer->tags as $key => $tagItem)
                            <p class="btn btn-secondary btn-sm disabled me-2 pt-0 pb-0 ps-1 pe-1">
                                {{ $tagItem->tag }}
                            </p>
                        @empty
                            <p class="btn btn-secondary btn-sm disabled me-2 pt-0 pb-0 ps-1 pe-1">
                                Профиль тренировок не указан
                            </p>
                        @endforelse

                    </div>
                    <a class="btn btn-outline-secondary"
                        href="{{ route('trainers.show', ['id' => $trainer->id]) }}">Подробнее &raquo;</a>
                </div>
                <!-- /.col-lg-4 -->
            @empty
                <h2>Список пуст</h2>
            @endforelse
        </div><!-- /.row -->
        {{ $trainersList->links() }}
        <hr class="featurette-divider">
    </div>
@endsection;
