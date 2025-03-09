@extends('template')
@section('content')
    <a class="btn btn-primary" href="{{ route('createEvenement') }}">Add</a>
    <table class="table table-striped">

        <thead>
            <tr>
                <th>Libelle</th>
                <th>Prix</th>
                <th>Date</th>
                <th>Lieu</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
           @foreach($evenements as $e)
               <tr>
                   <td>{{ $e->libelle }}</td>
                   <td>{{ $e->prix }}</td>
                   <td>{{ $e->date }}</td>
                   <td>{{ $e->lieu }}</td>
                   <td>{{ $e->description }}</td>
                   <td>
                       <a href="{{ route('editEvenement', ['id' => $e->id]) }}">Modifier</a>
                   <form action="{{route('supprimerEvenement', ['id'=> $e->id])}}" method="post">
                       @csrf
                       @method('delete')
                       <button class="btn btn-danger" type="submit">Supprimer</button>
                   </form>
                   </td>
               </tr>

           @endforeach
        </tbody>
    </table>
@endsection
