@extends('layouts.app')
@section('content')
        <vuetwittershow :twitter_id='@php echo "$twitter_id"; @endphp'></vuetwittershow>
   
@endsection