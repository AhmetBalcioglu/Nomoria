@extends('layouts.master')

@section('page_title', 'Ana Sayfa - Nomoria')

@section('page_description', 'Nomoria ana sayfasıdır.')

@section('page_head_css')

    <style>
        .slider {
            width: 100%;
            height: 500px;
            overflow: hidden;
        }

        .carousel-inner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        * {
            font-size: 62, 5%;
        }

        .fixed-right {
            position: fixed;
            right: 0;
            bottom: 0;
            z-index: 1000;
        }

        body {
            background-color: #f4f2f2;
            font-family: 'Arial', sans-serif;
        }

        .slider-wrapper {
            margin: 0 70px;
        }

        .slider-container {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 20px;
            width: 100%;
        }


        .carousel-inner img {
            height: 300px;
            object-fit: cover;
            width: 100%;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: flex-start;
        }

        .card {
            transition: all 0.3s ease-in-out;
            border-radius: 10px;
            border: 1px solid #ece9e9;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #fbfafa;
            overflow: hidden;
            width: 18%;
            /* Kartların genişliği */
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            background-color: #f5f7fa;
        }

        .card p {
            font-size: 0.9rem;
            color: #555;
            margin: 10px 0;
            text-align: center;
        }

        .card img {
            border-radius: 10px 10px 0 0;
            object-fit: cover;
            height: 150px;
            width: 100%;
        }

        h2 {
            font-family: 'Arial', sans-serif;
            color: #333;
            letter-spacing: 0.5px;
            margin: 1.5rem 0;
            text-align: center;
        }

        /* Popup */
        .popup {
            display: none;
            position: fixed;
            top: 20%;
            right: 20%;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            width: 300px;
            max-width: 90%;
            animation: fadeIn 0.8s ease-in-out;

            img {
                max-width: 100%;
                margin-top: 2rem;
            }
        }

        .popup .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 1.2rem;
            background: none;
            border: none;
            cursor: pointer;
        }

        .popup .popup-content {
            font-size: 1rem;
            color: #333;
        }


        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

@endsection

@section('content')


    @include('layouts.sections.home._home')

@endsection

@section('page_body_js')

    {{-- Anasayfaya giriş yapıldıgında ekranda gözüken Hemen üye ol popup kodu  --}}
    <script>
        window.onload = function() {
            setTimeout(function() {
                document.getElementById("popup").style.display = "block";
            }, 500);
        }


        function closePopup() {
            document.getElementById("popup").style.display = "none";
        }
    </script>

@endsection
