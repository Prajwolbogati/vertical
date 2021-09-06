<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expiry Mail</title>
</head>
<body>
    @foreach($remainder as $remind)
  
{{$remind['exp_date']}}

{{$remind['account']['domainname']}}

<p>Dear, sir your domain is expiring soon. Please, renew it soon.</p>


    @endforeach
    
    <p>Thank You</p>
</body>
</html>