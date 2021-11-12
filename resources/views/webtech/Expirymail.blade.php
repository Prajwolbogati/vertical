<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expiry Mail</title>
</head>
<body>
    @foreach ($remainder as $remind)
    @foreach ($template as $key=>$temp)
    @if(\Carbon\Carbon::parse($remind['exp_date'])->diffInDays( \Carbon\Carbon::now()) == 0)
    @if($key == 0)
@php
$message = str_replace('{{ $remind[\'account\'][\'fullname\'] }}', $remind['account']['fullname'], $temp['template'] );
$message = str_replace('{{ $remind[\'account\'][\'domainname\'] }} ', $remind['account']['domainname'], $message );
$message = str_replace('{{ $remind[\'active_date\'] }} ', $remind['active_date'], $message );
$message = str_replace('{{ $remind[\'exp_date\'] }} ', $remind['exp_date'], $message );
$message = str_replace('{{ $remind[\'account\'][\'hostingquota\'] }} ', $remind['account']['hostingquota'], $message );
@endphp
<pre>
@php echo $message; @endphp</pre>
@endif
    @else
@if($key > 0)
    @php
$message = str_replace('{{ $remind[\'account\'][\'fullname\'] }}', $remind['account']['fullname'], $temp['template'] );
$message = str_replace('{{ $remind[\'account\'][\'domainname\'] }} ', $remind['account']['domainname'], $message );
$message = str_replace('{{ $remind[\'active_date\'] }} ', $remind['active_date'], $message );
$message = str_replace('{{ $remind[\'exp_date\'] }} ', $remind['exp_date'], $message );
$message = str_replace('{{ $remind[\'account\'][\'hostingquota\'] }} ', $remind['account']['hostingquota'], $message );
@endphp
<pre>
@php echo $message; @endphp</pre>
    @endif
             @endif
    @endforeach
    @endforeach
</body>
</html>
