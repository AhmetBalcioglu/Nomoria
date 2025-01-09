@extends('layouts.master')

@section('page_title', $details['name'])
@section('page_description', $details['name'] . ' detayları')

@section('content')
    <div class="container mt-5">
        <h1>{{ $details['name'] }}</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <!-- Restoran Fotoğrafı -->
                    @if (isset($details['photos']))
                        <img src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference={{ $details['photos'][0]['photo_reference'] }}&key={{ config('services.google_places.api_key') }}"
                            class="card-img-top" alt="Restoran Fotoğrafı">
                    @else
                        <img src="{{ asset('images/default.jpg') }}" class="card-img-top" alt="Varsayılan Fotoğraf">
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <p><strong>Adres:</strong> {{ $details['vicinity'] }}</p>
                    <p><strong>Puan:</strong> {{ $details['rating'] ?? 'N/A' }}</p>
                    <p><strong>Telefon:</strong> {{ $details['formatted_phone_number'] ?? 'N/A' }}</p>
                    @if (isset($details['opening_hours']['weekday_text']))
                        <p><strong>Çalışma Saatleri:</strong></p>
                        <ul>
                            @foreach ($details['opening_hours']['weekday_text'] as $day)
                                <li>{{ $day }}</li>
                            @endforeach
                        </ul>
                    @endif
                    @if (isset($details['website']))
                        <p><strong>Web Sitesi:</strong> <a href="{{ $details['website'] }}"
                                target="_blank">{{ $details['website'] }}</a></p>
                    @endif
                    <a href="{{ route('restaurants.index') }}" class="btn btn-secondary">Geri Dön</a>
                </div>
            </div>
        </div>
    </div>

    <!-- CSS kodları burada -->
    <style>
        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
            text-align: left;
        }

        .card-body .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .card-body .card-text {
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        .card-body .btn {
            width: 100%;
            margin-top: 10px;
        }

        /* Fotoğraflar için varsayılan bir görsel */
        .card-header img {
            object-fit: cover;
        }

        /* Genel düzen için container */
        .container {
            max-width: 1200px;
        }

        /* Mobil uyumlu tasarım için responsive düzenlemeler */
        @media (max-width: 767px) {
            .card-header img {
                height: 200px;
            }
        }
    </style>
@endsection
