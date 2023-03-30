@extends ('app.layout')
@section('content')

    <h1 class="h3 mt-5 mb-4 text-gray-800">Usuarios </h1>
    <div class="row">
        <div class="col-lg-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                
                <div class="card-body">
                    @if (session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div><br />
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Usuario</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($users) > 0)
                                    @foreach ($users as $user)
                                        <tr>
                                            <td> {{ $user->id }} </td>
                                            <td> {{ $user->name }}</td>
                                            <td> {{ $user->email }} </td>
                                            <td>
                                                 
                                                    <div class="badge badge-info">Administrador</div>
                                                
                                            </td>
                                            <td>
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="btn btn-primary btn-circle btn-sm"><i
                                                        class="far fa-edit"></i></a>
                                               
                                            </td>
 
                                        </tr>
                                    @endforeach
                            </tbody>
                        @else
                            <tbody>
                                <tr>
                                    <td align="center" colspan="5">
                                        <h6>NO SE ENCONTRARON REGISTROS</h6>
                                    </td>
                                </tr>
                            </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
