@extends('principal')
@section('contenido')
<template v-if="menu==0">
<example-component></example-component>
</template>
<template v-if="menu==1">
<profesional></profesional>
</template>

@endsection