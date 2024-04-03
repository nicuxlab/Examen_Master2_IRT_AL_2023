@extends('layouts.app')

@section('content')
<div class="container">
    <ul class="nav nav-fill nav-tabs" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="fill-tab-0" data-bs-toggle="tab" href="#fill-tabpanel-0" role="tab" aria-controls="fill-tabpanel-0" aria-selected="true"> Créer une mission </a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="fill-tab-1" data-bs-toggle="tab" href="#fill-tabpanel-1" role="tab" aria-controls="fill-tabpanel-1" aria-selected="false"> Mes missions </a>
        </li>
        
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="fill-tab-3" data-bs-toggle="tab" href="#fill-tabpanel-3" role="tab" aria-controls="fill-tabpanel-3" aria-selected="false">En cours</a>
          </li>
      </ul>
      <div class="tab-content pt-5" id="tab-content">
        <div class="tab-pane active" id="fill-tabpanel-0" role="tabpanel" aria-labelledby="fill-tab-0">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header text-center"> <strong>Nouvelle mission d'intérim</strong></div>
        
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('missions.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        @error('fullname')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="fullname"><strong>Auteur</strong> </label>
                                            <input type="text" class="form-control" id="fullname" placeholder="Entrer votre nom et prénom" name="fullname">
                                        </div>

                                    </div>
                                    <div class="col-md-12 mb-3">
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="description"> <strong>Description</strong></label>
                                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        @error('date_debut')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="date_debut"><strong>Date de début</strong> </label>
                                            <input type="date" class="form-control" id="date_debut" name="date_debut">
                                        </div>
                                    </div>
                                     <div class="col-md-6 mb-3">
                                        @error('heure_minute')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="heure_minute"><strong>Heure et minute</strong> </label>
                                            <input type="time" class="form-control" id="heure_minute" name="heure_minute">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        @error('date_fin')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="date_fin"><strong>Date de fin</strong></label>
                                            <input type="date" class="form-control" id="date_fin" name="date_fin">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        @error('taux_horaire')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="taux_horaire"> <strong>Taux horaire</strong></label>
                                            <input type="number" class="form-control" id="taux_horaire" name="taux_horaire">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        @error('lieu')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="lieu"><strong>Lieu</strong></label>
                                            <textarea class="form-control" id="lieu" name="lieu" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        @error('competences')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="modal-box">
                                            <div class="sd-multiSelect form-group">
                                              <label for="current-job-role"><strong>Compétences requises</strong></label>
                                              <select multiple id="current-job-role" class="form-control sd-CustomSelect" name="competences[]">
                                                  <i class="fa fa-star"></i>
                                                    {{-- <option value="" disabled selected>Sélectionnez les compétences...</option> --}}

                                                    @foreach ($competences as $competence)
                                                      <option value="{{ $competence->id }}">{{ $competence->id }} - {{ $competence->nom }}</option>
                                                    @endforeach
                                              </select>
                                            </div>
                                          </div>
                                    </div>
        
                                    <div class="col-md-12 mt-3 mb-3">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                         <div class="form-group">
                                            <input type="file" name="image" id="file" class="inputfile" accept="image/*" onchange="updateFileName(this)" />
                                            <label for="file" id="file-label">Cliquer pour sélectionner une image</label>
        
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg">Enregistrer</button>
                                </div>
                                               
                                {{-- <a href="{{ route('missions.index') }}" class="btn btn-secondary">Annuler</a> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="fill-tabpanel-1" role="tabpanel" aria-labelledby="fill-tab-1">
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
                            <div class="alert alert-info text-center" role="alert">
                                Aucune mission en cours pour le moment.
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
        </div>
        
        <div class="tab-pane" id="fill-tabpanel-3" role="tabpanel" aria-labelledby="fill-tab-3">
            <div class="alert alert-info text-center" role="alert">
                Cette partie n'est pas explicite sur l'épreuve
            </div>
        </div>

      </div>
</div>




@endsection
