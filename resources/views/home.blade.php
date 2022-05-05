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

                  <h6>Bienvenue vous êtes authentifié</h6><br>
                   <table class="table">
                       <tr class="table-primary">
                           <td class="table-info"><strong><h5>Nom</h5></strong></td>
                           <td class="table-success"><strong><h5>Prenom</h5></strong></td>
                           <td><strong><h5>Email</h5></strong></td>
                       </tr>
                       <tr>
                        <td>dd</td>
                        <td>dd</td>
                        <td>dd</td>
                        
                       </tr>
                   </table>

                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
