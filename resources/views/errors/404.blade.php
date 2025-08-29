@extends('errors.custom')

@section('title', '404 | Halaman Tidak Ditemukan')

@php
    $exception = new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException('Halaman yang Anda cari tidak dapat ditemukan.');
@endphp