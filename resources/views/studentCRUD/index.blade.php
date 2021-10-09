@extends('dashboard')

@section('content')

    <div class="d-flex justify-content-between mt-5 mb-5">
        <div>
            <h2>Student CRUD</h2>
        </div>
        <div>
            <a class="btn btn-success" href="{{  route('mails.index') }}">Send Email</a>
            <a class="btn btn-success" href="{{  route('students.create') }}">Create a New Student</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Birthplace</th>
            <th>Birthdate</th>
            <th width="280px" class="text-center">Action</th>
        </tr>
        @if(count($students))
        @foreach($students as $student)
        <tr>
            <td class="text-center">{{ $student->id }}</td>
            <td>
                {{ $student->nama_depan }}
                {{ $student->nama_belakang }}
            </td>
            <td>
                {{ $student->email }}
            </td>
            <td>
                {{ $student->no_telp }}
            </td>
            <td>
                {{ $student->tempat_lahir }}
            </td>
            <td>
                {{ $student->tanggal_lahir }}
            </td>
            <td class="text-center">
                <form action="{{ route('students.destroy',$student->id) }}" method="POST">

                    <a class="btn btn-info btn-sm" href="{{ route('students.show',$student->id) }}">Show</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('students.edit',$student->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td align="center" colspan="3">Empty Data!! Have a nice day :)</td>
        </tr>
        @endif
    </table>
@endsection