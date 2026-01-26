@extends('layouts.app') {{-- Cambia si usas otro layout --}}

@section('title', 'Términos y Condiciones')

@section('content')

<style>
    :root {
        --primary: #2563eb;
        --bg: #f8fafc;
        --card: #ffffff;
        --text: #1f2937;
        --muted: #6b7280;
        --border: #e5e7eb;
    }

    .tc-header {
        background: linear-gradient(135deg, #16243D, #16243D);
        color: #fff;
        padding: 3rem 1rem;
        text-align: center;
    }

    .tc-header h1 {
        font-size: 2.2rem;
        font-weight: 700;
        margin: 0;
    }

    .tc-header p {
        margin-top: .5rem;
        opacity: .9;
    }

    .tc-container {
        max-width: 900px;
        margin: -40px auto 60px;
        padding: 0 1rem;
    }

    .tc-card {
        background: var(--card);
        border-radius: 14px;
        padding: 2.5rem;
        box-shadow: 0 20px 40px rgba(0,0,0,.08);
        border: 1px solid var(--border);
    }

    .tc-card h2 {
        color: var(--primary);
        font-size: 1.3rem;
        margin-top: 2rem;
        font-weight: 600;
    }

    .tc-card h2:first-child {
        margin-top: 0;
    }

    .tc-card p {
        margin: .5rem 0 1rem;
        line-height: 1.7;
    }

    .tc-card ul {
        padding-left: 1.2rem;
    }

    .tc-footer {
        text-align: center;
        color: var(--muted);
        font-size: .9rem;
        padding-bottom: 2rem;
    }

    @media (max-width: 600px) {
        .tc-card {
            padding: 1.5rem;
        }

        .tc-header h1 {
            font-size: 1.8rem;
        }
    }
</style>

<section class="tc-header">
    <img src="{{asset('storage/' . $business->image)}}" width="200" alt="Logo">
        <h1 class="text-white">Términos y Condiciones</h1>
    <p>Última actualización: {{ now()->format('d/m/Y') }}</p>
</section>

<section class="tc-container">
    <div class="tc-card">

        {!! Str::markdown($terminos->description) !!}

    </div>
</section>

<div class="tc-footer my-5">
    © {{ date('Y') }} <strong>{{ config('app.name') }}</strong> ·
</div>

@include('partials.footer')

@endsection



