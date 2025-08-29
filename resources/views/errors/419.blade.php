@extends('errors.custom')

@section('title', '419 | Sesi Kedaluwarsa')

@php
    $exception = new \Symfony\Component\HttpKernel\Exception\HttpException(419, 'Sesi Anda telah kedaluwarsa. Silakan muat ulang halaman dan coba lagi.');
@endphp