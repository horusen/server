@component('mail::message')
# Bonjour

Vous avez été inscrit sur l'application UNAMUSC SENEGAL par {{ $sender->name }}.
Veuillez cliquer sur le boutton ci-dessous pour valider l'inscription.

@component('mail::button', ['url' => $url])
Valider l'inscription
@endcomponent

Cordialement<br>
<!-- {{ config('app.name') }} -->
@endcomponent
