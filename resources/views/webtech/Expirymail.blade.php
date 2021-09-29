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
  







  
    <pre class="haha">
Dear <strong>{{$remind['account']['fullname']}},</strong>

Your domain {{$remind['account']['domainname']}} hosting from {{$remind['active_date']}} to {{$remind['exp_date']}} with webspace {{$remind['account']['hostingquota']}} has been expired.
Please renew the domain at your earliest convenience to ensure the service continues uninterrupted. The domain might be subjected to suspension and cancellation if it is not renewed before the expiration date and we have no liability whatsoever with respect to any such cancellation. Should you have any questions about the renewal process, please feel free to contact us.
Thank you for your cooperation.

Administrator

Webtech Nepal
Lazimpat, kathmandu
Email: webtechnepal.com
Phone: 99999999999

    </pre>
    @endforeach
</body>
</html>

