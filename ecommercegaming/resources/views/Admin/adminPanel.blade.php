@extends('Admin/layoutAdmin')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="container mt-3">@include('flash::message')</div>

                <h1 class="mt-4">Panneau Administrateur</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Admin</li>
                    <li class="breadcrumb-item">Membres</li>
                </ol>
                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-header">
                                <h3>Nombre de membre</h3>
                                <p>7 derniers jours</p>
                            </div>
                            <div class="card-body">
                                <i class="fas fa-users" style="font-size: 50px; margin-right:2em"></i>
                                <p class='d-inline' style="font-size: 50px">{{ $userscount7 }}</p>
                            </div>

                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#Datatable">En savoir plus</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-header">
                                <h3>Nombre de membre</h3>
                            </div>
                            <div class="card-body">
                                <i class="fas fa-users" style="font-size: 50px; margin-right:2em"></i>
                                <p class='d-inline' style="font-size: 50px">{{ $userscount }}</p>
                            </div>

                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#Datatable">En savoir plus</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-header">
                                <h3>Nombre de Vente</h3>
                            </div>
                            <div class="card-body">
                                <i class="fas fa-users" style="font-size: 50px; margin-right:2em"></i>
                                <p class='d-inline' style="font-size: 50px">{{ $ventes->count() }}</p>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Listes des membres
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="Datatable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Credit</th>
                                        <th>Date de naissance</th>
                                        <th>Date de creation</th>
                                        <th>Derniere Modification</th>
                                        <th>Admin</th>
                                        <th>Modifier</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Credit</th>
                                        <th>Date de naissance</th>
                                        <th>Date de creation</th>
                                        <th>Derniere Modification</th>
                                        <th>Admin</th>
                                        <th>Modifier</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->wallet }}</td>
                                            <td>{{ date('d/m/Y', strtotime($user->birthdate)) }}</td>
                                            <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
                                            <td>{{ date('d-m-Y', strtotime($user->updated_at)) }}</td>
                                            <td>{{ $user->is_admin }}</td>
                                            <td><a href="admin/modifyUser/{{ $user->id }}"><button type="button"
                                                        class="btn btn-warning d-flex mx-auto"><i
                                                            class="fas fa-edit"></i></button></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; FindMyGame 2020</div>
                </div>
            </div>
        </footer>
    </div>
@endsection
