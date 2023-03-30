@extends ('app.layout')
@section('content')

    <h1 class="h3 mt-5 mb-4 text-gray-800">Empleados </h1>
    <div class="row">
        <div class="col-lg-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="{{ route('employees.create') }}"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-plus fa-sm text-white-50"></i> Nuevo empleado</a>
                </div>
                <div class="card-body">
                    @if (session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div><br />
                    @endif
                   
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>F. Nacimiento</th>
                                    <th>Correo</th>
                                    <th>Género</th>
                                    <th>Teléfono</th>
                                    <th>Celular</th>
                                    <th>F. Ingreso</th>
                                    <th>Departamento</th>
                                    <th>Empresa</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($employees) > 0)
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td> {{ $employee->id }} </td>
                                            <td> {{ $employee->name . ' ' . $employee->first_lastname . ' ' . $employee->second_lastname }}
                                            </td>
                                            <td> {{ $employee->birthday }} </td>
                                            <td> {{ $employee->email }} </td>
                                            <td> {{ $employee->gender }} </td>
                                            <td> {{ $employee->phone }} </td>
                                            <td> {{ $employee->cell_phone }} </td>
                                            <td> {{ $employee->date_of_admission }} </td>
                                            <td> {{ $employee->department }} </td>
                                            <td> {{ $employee->company }} </td>
                                            <td>
                                                <a href="{{ route('employees.edit', $employee->id) }}"
                                                    class="btn btn-primary btn-circle btn-sm"><i
                                                        class="far fa-edit"></i></a>
                                                <form action="{{ route('employees.destroy', $employee->id) }}"
                                                    method="post" style="display: inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-circle btn-sm" type="submit"
                                                        onclick="return confirm('¿Seguro que deseas eliminar este registro?')"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        @else
                            <tbody>
                                <tr>
                                    <td align="center" colspan="12">
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
