<!-- resources/views/torty/list.blade.php -->

@foreach($torty as $torta)
    <!-- Zde zobrazte informace o dortu, například název, základní složení, cena, atd. -->
    <p>Název: {{ $torta->nazov }}</p>
    <p>Základní složení: {{ $torta->zakladne_zlozenie }}</p>
    <p>Cena: {{ $torta->cena }}</p>
    <!-- ... Další informace o dortu ... -->
@endforeach
