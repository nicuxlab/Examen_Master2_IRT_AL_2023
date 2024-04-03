@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">           
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($missions->isEmpty())
                    <div class="alert alert-info" role="alert">
                        Aucune mission pour le moment.
                    </div>
                @else

                <table class="table">
                    <thead class="table-dark">
                        <tr style="text-align: center;">
                            <th>AUTEUR</th>
                            <th>MISSION</th>

                            <th>NOMBRE DE CANDIDATS</th>
                            <th>STATUS</th>
                            <th>TEMPS</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        @foreach ($missions as $mission)
                        <tr>
                            <td scope="row" style="text-align: center;">
                                @if ($mission->image)
                                    <img src="{{ asset('images/' . $mission->image) }}" style="text-align: center;" height="80" width="80" alt="Mission Image">
                                    <br>
                                    <strong>{{ $mission->fullname }}</strong>
                                @endif
                            </td>
                            
                            <td scope="row">
                                
                                @foreach ($mission->competences as $competence)
                                    <span class="badge bg-primary">{{ $competence->nom }}</span> <br>
                                @endforeach
                                {{ $mission->lieu }}
                            </td>

                            <td scope="row"> {{ $mission->competences->count() }}</td>
                            
                            <td scope="row" >
                                <span class="badge bg-dark">{{ $mission->statut }}</span>
                            </td>

                            <td scope="row">{{ \Carbon\Carbon::parse($mission->heure_minute)->format('H:i') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
