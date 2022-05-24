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
                      {{--Modal Modification mot de passe--}}  
                      <!-- Modal -->
                      <div class="modal fade" id="Pass" data-bs-backdrop="static" tabindex="-1" aria-labelledby="PassLabel">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h3 class="modal-title" id="staticBackdropLabel">Modification mot de passe</h3>
                              {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                            </div>
                            @if (Auth::user())     
                                <form method="POST" action="">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row mb-3">
                                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Nouveau Mot de passe') }}</label>
                                               <div class="col-md-6">
                                                  <input id="password" type="password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                     @error('password')
                                                         <span class="invalid-feedback" role="alert">
                                                             <strong>{{ $message }}</strong>
                                                         </span>
                                                     @enderror
                                               </div>
                                         </div>
                     
                                         <div class="row mb-3">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmation mot de passe') }}</label>   
                                               <div class="col-md-6">
                                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                               </div>
                                         </div>

                                    </div>
                                </form>
                            @endif
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                              <button type="button" class="btn btn-primary">Enregistrer</button>
                            </div>
                          </div>
                        </div>
                      </div>
                     {{--fin ---}}             
        

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        @if (Auth::user())
                        <h2>Bienvenue <strong> {{ Auth::user()->name }}</strong> Admin Connecté</h2><br>
                        @endif
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
                        @if (is_countable($users) && count($users)!=0)
                          @foreach ($users as $user)
                            <tr class="">    
                                       <td class="table-warning"><strong>{{ $user->id}}</strong></td>
                                       <td class="table-danger"><strong>{{ $user->name}}</strong></td>
                                       <td class="table-info"><strong>{{ $user->email}}</strong></td>
                                       <td><strong><button type="button" data-toggle="modal" data-target="#Supprim"class="btn btn-danger">Supprimer</button></strong></td>
                                    @endforeach
                            </tr>                
                        @endif
                              {{--Debut modal suppUser--}}
        <div class="modal fade" id="Supprim" tabindex="-1" role="dialog" aria-labelledby="SuppLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    {{-- <div class="modal-header">
                        <h1>Suppression</h1> --}}
                      <div class="modal-body">   
                        Voulez vous vraiment supprimer cette administrateur?
                      <div class="modal-footer">
                            <button type="submit"  class="btn btn-danger">Oui</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Non</button>
                        </div>
                    </div>
            </div> 
        </div>              
        
            
        {{--Debut modal suppUser--}}    
                                {{-- <td><strong> --}}
                                        {{-- <h5> {{ Auth::user()->id }}</h5> --}}
                                    {{-- </strong></td>
                                <td><strong> --}}
                                        {{-- <h5> {{ Auth::user()->name }}</h5> --}}
                                    {{-- </strong></td>
                                <td><strong> --}}
                                        {{-- <h5>{{ Auth::user()->email }}</h5> --}}
                                    {{-- </strong></td> --}}
                                {{-- <td><button type="button" data-toggle="modal" data-target="#Modif" class="btn btn-success">Modifier</button></td>
                                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Supp">Supprimer</button></td> --}}
                            
                        </table>

                    </div>
                </div>
            </div>
        </div>

        {{-- Modal de modification--}}
        {{-- <div class="modal" tabindex="-1" role="dialog">
         </div> --}}
            <div class="modal fade" id="Modif" tabindex="-1" role="dialog" aria-labelledby="ModifierLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1>Modification</h1>
                            {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button> --}}
                      
                        </div>
                 @if (Auth::user())     
                    <form method="POST" action="{{url('/modifier/'.Auth::user()->id)}}">
                            @csrf
                        <div class="modal-body">   
                            <div class="row mb-3">
                                <input type="hidden" value="{{ Auth::user()->id}}">
                               <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>
                                    <div class="col-md-6">
                                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{  Auth::user()->name }}" required autocomplete="name" autofocus>
                                          @error('name')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                        @enderror
                                    </div>
                            </div>
        
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Adresse Email') }}</label>        
                                    <div class="col-md-6">
                                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                            </div>
                            {{-- <div class="row mb-3">
                               <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe') }}</label>
                                  <div class="col-md-6">
                                     <input id="password" type="password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                  </div>
                            </div>
        
                            <div class="row mb-3">
                               <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmation mot de passe') }}</label>   
                                  <div class="col-md-6">
                                     <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                  </div>
                            </div> --}}
        
                                {{-- <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Enregistrer') }}
                                        </button>
                                    </div>
                                </div><br>
                              --}}
        
                                {{-- <a href="/home">Back</a> --}}
                            

                           
                        </div>
                                <div class="modal-footer">
                                    <button type="submit"  class="btn btn-primary">Enregistrer</button>
                                    <button type="submit" class="btn btn-warning" data-dismiss="modal">Annuler</button>
                                </div>
                    </div>
                </form>
              @endif  
                </div>
        </div>
        
        {{-- fin modal modif--}}


        {{-- modal suppression--}}
        <div class="modal fade" id="Supp" tabindex="-1" role="dialog" aria-labelledby="SupprimLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {{-- <div class="modal-header">
                        <h1>Suppression</h1> --}}
                      <div class="modal-body">   
                        Voulez vous vraiment supprimer votre compte?
                      <div class="modal-footer">
                            <button type="submit"  class="btn btn-danger">Oui</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Non</button>
                        </div>
                    </div>
            </div> 
        </div>              
        {{--fin suppression--}}


    
      
       
       
      

    </div>
@endsection
