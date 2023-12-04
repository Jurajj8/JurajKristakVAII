@foreach($torty as $torta)
    <p>Název: {{ $torta->nazov }}</p>
    <p>Základní složení: {{ $torta->zakladne_zlozenie }}</p>
    <p>Cena: {{ $torta->cena }}</p>
@endforeach
