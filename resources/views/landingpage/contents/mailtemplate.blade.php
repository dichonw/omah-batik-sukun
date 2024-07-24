<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Omah Batik Sukun | Pesan dari pelanggan</title>
</head>
<body>
    <p>Hallo Omah Batik Sukun ada pesan baru dari:</p>
    <table>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td>{{$details['name']}}</td>
      </tr>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td>{{$details['email']}}</td>
      </tr>
      <tr>
        <td>Pesan</td>
        <td>:</td>
        <td>{{$details['message']}}</td>
      </tr>
    </table>
    <p>Terimakasih <b>{{$details['name']}}</b> telah memberi pesan kepada kami.</p>
</body>
</html>