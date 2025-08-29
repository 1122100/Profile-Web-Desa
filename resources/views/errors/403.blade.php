@extends('errors.custom')

@section('title', '403 | Akses Ditolak')

@php
    $exception = new \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException('Anda tidak memiliki izin untuk mengakses halaman ini.');
@endphp