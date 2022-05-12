@extends('layouts.app')
@extends('icon.IconTitre')
@section('titre')
    Page d'accueil
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Responsables du NOGAE</h5>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (Auth::user())
                        <h2>Bienvenue <strong> {{ Auth::user()->name }}</strong> </h2><br>
                        <table class="table">
                            <tr class="table-primary">
                                <td><strong>
                                        <h5>Id</h5>
                                    </strong></td>
                                <td class="table-info"><strong>
                                        <h5>Nom</h5>
                                    </strong></td>
                                <td class="table-success"><strong>
                                        <h5>Email</h5>
                                    </strong></td>
                                <td><strong>
                                        <h5>
                                            <center>Options</center>
                                        </h5>
                                    </strong></td>
                                <td></td>
                            </tr>
                            <tr>
                               
                            <tr class="table-light">
                                <td><strong>
                                        <h5> {{ Auth::user()->id }}</h5>
                                    </strong></td>
                                <td><strong>
                                        <h5> {{ Auth::user()->name }}</h5>
                                    </strong></td>
                                <td><strong>
                                        <h5>{{ Auth::user()->email }}</h5>
                                    </strong></td>
                                <td><button type="button" data-toggle="modal" data-target="#Modif" class="btn btn-success">Modifier</button></td>
                                <td><a class="btn btn-danger">Supprimer</a></td>
                            </tr>
                            @endif

                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        {{-- Modal --}}
            <div class="modal fade" id="Modif" tabindex="-1" role="dialog" aria-labelledby="ModifierLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1>modifier</h1>
                        </div>
                        <div class="modal-body">

                           
                        </div>
                        <div class="modal-footer">
                            <button type="button"  class="btn btn-info">Enregistrer</button>
                            <button type="button" class="btn btn-info">Quitter</button>
                        </div>
                    </div>
                </div>
        </div>
        
        {{-- fin modal --}}
       
       
      

    </div>
@endsection
