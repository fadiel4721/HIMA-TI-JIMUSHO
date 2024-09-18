<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Mahasiswa</title>
</head>
<body>
    <form id="mahasiswaForm" onsubmit="createMahasiswa(event)">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br><br>
        
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" required><br><br>

        <input type="hidden" id="signature" name="signature" value="eba8e288da46b4b9e7866bbafe8f1118017bfea983d5a180bec472ab0fa79cc8">
        
        <button type="submit">Submit</button>
    </form>

    <div id="responseMessage"></div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function createMahasiswa(event) {
            event.preventDefault();

            const nama = document.getElementById('nama').value;
            const nim = document.getElementById('nim').value;
            const signature = document.getElementById('signature').value;

            axios.post('/mahasiswa/create', {
                nama: nama,
                nim: nim,
                signature: signature
            })
            .then(response => {
                document.getElementById('responseMessage').innerHTML = 'Data berhasil dikirim!';
                console.log(response.data);
            })
            .catch(error => {
                document.getElementById('responseMessage').innerHTML = 'Terjadi kesalahan: ' + error.message;
                console.error(error);
            });
        }
    </script>
</body>
</html>
