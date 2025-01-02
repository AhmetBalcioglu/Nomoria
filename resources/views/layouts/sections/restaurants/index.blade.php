@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Restoranlar</h1>
        <form method="GET" action="{{ route('restaurants.index') }}">
            <input type="text" name="location" placeholder="Konum (örn. 41.0082,28.9784)" value="{{ request('location') }}">
            <input type="text" name="type" placeholder="Yemek Türü (örn. cafe)" value="{{ request('type') }}">
            <button type="submit">Filtrele</button>
        </form>
        <div class="row mt-3">
            @foreach($restaurants as $restaurant)
                <div class="col-md-4">
                    <div class="card">
                        <!-- Google Maps fotoğrafı -->
                        @if (isset($restaurant['photos']))
                            <img src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference={{ $restaurant['photos'][0]['photo_reference'] }}&key={{ env('GOOGLE_PLACES_API_KEY') }}" class="card-img-top" alt="{{ $restaurant['name'] }}">
                        @else
                            <img src="https://via.placeholder.com/400" class="card-img-top" alt="{{ $restaurant['name'] }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $restaurant['name'] }}</h5>
                            <p class="card-text">{{ $restaurant['vicinity'] }}</p>
                            <p class="card-text">Puan: {{ $restaurant['rating'] ?? 'N/A' }} Yıldız</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
