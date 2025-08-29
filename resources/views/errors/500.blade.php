@extends('errors.custom')

@section('title', '500 | Kesalahan Server')

@php
    $exception = new \Symfony\Component\HttpKernel\Exception\HttpException(500, 'Terjadi kesalahan pada server.');
@endphp