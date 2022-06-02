@component('mail::message')
<h2>Mensaje para restablecer la contraseña del usuario</h2> 
Para poder restablecer o cambiar su contraseña, haga clic en Cambiar contraseña.
@component('mail::button', ['url' => 'http://localhost:4200/change-password?token='.$token])
Cambiar contraseña
@endcomponent
Muchas gracias,<br>
el equipo de {{ config('app.name') }}
@endcomponent