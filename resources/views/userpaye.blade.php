<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMS EXPRESS</title>
</head>
<body class="m-0 p-0">

    <div class="m-0 p-0" style="height: 100vh; display: flex; justify-content: center; align-items:center">
        <img src="{{asset('image/logo.jpg')}}" class=" w-6 h-6" alt="">
    </div>

<script src="https://cdn.kkiapay.me/k.js"></script>
<script>
    openKkiapayWidget({
        amount:"{{$pack->chiffre}}",
        position:"center",
        callback:"",
        name:"SMS EXPRESS",
        email:"info@smsexpress.pro",
        data:"",
        sandbox: true,
        paymentmethod: 'momo',
        theme:"#0c6199",
        callback: "{{route('validepack',$pack->id)}}",
        key:"2ee121605d3511eea596e938ae1c409a"
    })
</script>
</body>
</html>
