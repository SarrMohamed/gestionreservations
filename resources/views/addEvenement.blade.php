@extends('template')
@section('content')
    <form action="{{ route($evenement->id ? 'updateEvenement' : 'storeEvenement') }}" method="post">
        @csrf
        @method($evenement->id ? 'put' : 'post')
        <input type="text" name="id" hidden value="{{$evenement->id}}">
        <label for="libelle" class="form-label">Libelle</label>
        <input type="text" class="form-control" name="libelle" value="{{$evenement->libelle ? $evenement->libelle : old('libelle')}}">
        @error('libelle')
        <div class="text-danger"> {{ $message }}</div>
        @enderror
        <label for="prix" class="form-label">prix</label>
        <input type="number" class="form-control" name="prix" value="{{$evenement->prix ? $evenement->prix : old('prix')}}">
        @error('prix')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <label for="date" class="form-label">date</label>
        <input type="date" class="form-control" name="dateEvenement" value="{{$evenement->date}}">
        <label for="lieu" class="form-label">lieu</label>
        <input type="lieu" class="form-control" name="lieu" value="{{$evenement->lieu}}">
        <label>Description</label>
        <textarea name="description" class="form-control">{{$evenement->description}}</textarea>
        <button type="submit" class="btn btn-primary">{{$evenement->id ? 'Modifier' : 'Ajouter   '}}</button>
    </form>
@endsection
