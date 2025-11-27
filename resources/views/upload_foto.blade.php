<!DOCTYPE html>
<html>
<head>
    <title>Upload Foto</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h2>Upload Foto Pendaftar</h2>
    
    <form id="uploadForm" enctype="multipart/form-data">
        @csrf
        <div>
            <label>ID Pendaftar:</label>
            <input type="number" name="pendaftar_id" required>
        </div>
        <div>
            <label>Pilih Foto:</label>
            <input type="file" name="foto" accept="image/*" required>
        </div>
        <button type="submit">Upload Foto</button>
    </form>

    <div id="result"></div>

    <script>
        document.getElementById('uploadForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            fetch('/upload-foto', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('result').innerHTML = 
                    '<p style="color: green;">' + data.message + '</p>';
            })
            .catch(error => {
                document.getElementById('result').innerHTML = 
                    '<p style="color: red;">Error: ' + error.message + '</p>';
            });
        });
    </script>
</body>
</html>