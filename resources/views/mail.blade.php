<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-color: #3d85c6">
    <div style="background-color: #FFFFFF">
    <div class="head" style="justify-content: space-between; display: flex;">
        <a href="http://www.uajy.ac.id/">
            <img src="https://seeklogo.com/images/U/universitas-katolik-atma-jaya-yogyakarta-logo-CF686EEC66-seeklogo.com.png" alt="Atma Jaya Logo" width="80px">
        </a>

        <strong style="font-size: 40px;">190710181</strong>
    </div>
    <hr>
    <strong style="text-align: center; color: #808080; font-size: 25px; margin-top: 40px; justify-content: center; display: flex;">Data Mahasiswa</strong>

    <table style="width:100%; margin-top: 40px;" border="solid">
        <thead>
            <tr>
                <th width="20px" class="text-center">No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Place & Date of Birth</th>
            </tr>
        </thead>
        <tbody>
            @if(count($detail))
            @foreach($detail as $student)
            <tr>
                <td width="20px" class="text-center">{{ $student->id }}</td>
                <td>
                    {{ $student->nama_depan }}
                    {{ $student->nama_belakang }}
                </td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->no_telp }}</td>
                <td>
                    {{ $student->tempat_lahir }},
                    {{ $student->tanggal_lahir }}
                </td>
            </tr>
            @endforeach
            @else
        <tr>
            <td align="center" colspan="3">Empty Data!! Have a nice day :)</td>
        </tr>
        @endif
        </tbody>
    </table>
    </div>
</body>
</html>