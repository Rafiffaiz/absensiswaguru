<!DOCTYPE html>
<html>
<head>
    <title>Login & Register</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { display: flex; gap: 50px; }
        form { border: 1px solid #ccc; padding: 20px; border-radius: 8px; width: 300px; }
        input, select { width: 100%; margin-bottom: 10px; padding: 8px; }
        button { width: 100%; padding: 10px; background: #007bff; color: white; border: none; border-radius: 4px; }
        button:hover { background: #0056b3; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h1>ABSEN SISWA - LOGIN / REGISTER</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <!-- LOGIN -->
        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <h2>Login</h2>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>

        <!-- REGISTER -->
        <form method="POST" action="{{ url('/register') }}">
            @csrf
            <h2>Register</h2>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>

            <label>Jurusan:</label>
            <select name="jurusan" required>
                <option value="RPL">RPL</option>
                <option value="MP">MP</option>
                <option value="TKJ">TKJ</option>
            </select>

            <label>Kelas:</label>
            <select name="kelas" required>
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
            </select>

            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
