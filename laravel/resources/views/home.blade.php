@extends('layouts.appNb')

@section('title', 'Domov')

@section('content')
<div class="container my-5" id="objednat">
      <div class="row">
        <div class="col-md-6">
          <h1>Vítajte v našej cukárni</h1>
          <p>
            V našom sladkom kráľovstve sa vytvárajú najlepšie sladkosti pre Vaše
            najvýznačnejšie okamihy. Sme cukrárskou firmou s dlhoročnou
            tradíciou a vášňou pre kvalitu.
          </p>
          <p>
            U nás nie sú sladkosti len dobrota, sú to umelecké diela, ktoré si
            zaslúžia byť súčasťou Vašich najlepších spomienok. Naše cukrárske
            schopnosti spájame s láskou k detailom, aby boli naše torty a koláče
            naozaj jedinečné.
          </p>
          <p>
            Radi Vás zavedieme na sladkú cestu plnú chutí, radosti a
            spokojnosti. Záleží nám na tom, aby ste si u nás užili nielen
            dokonalú chuť, ale aj nezabudnuteľný zážitok.
          </p>
          <p>
            Pripojte sa k nám a nechajte sa uniesť svetom sladkostí pani
            Marcely. Sme tu pre Vás, aby sme Vám urobili deň sladší!
          </p>
          <p>S pozdravom, Pani Marcela a celý tím cukrárov</p>
          <a href="lodne.html" class="btn btn-primary">Naše služby</a>
        </div>
        <div class="col-md-6 d-flex mt-5 justify-content-center">
          <img
            src="images/7.jpg"
            alt="Cukrárenský dort"
            class="img-fluid max-50"
          />
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-4 feature">
          <i class="bi bi-cake"></i>
          <h3>Chutné torty</h3>
          <p>
            Naše torty sú pripravené z kvalitných surovín a s láskou k detailom.
          </p>
        </div>
        <div class="col-md-4 feature">
          <i class="bi bi-clock"></i>
          <h3>Rýchle dodanie</h3>
          <p>Objednajte si torty online a doručíme ich rýchlo a spoľahlivo.</p>
        </div>
        <div class="col-md-4 feature">
          <i class="bi bi-person"></i>
          <h3>Osobný prístup</h3>
          <p>
            Sme tu pre vás a rádi vám pomôžeme s výberom torty pre vašu oslavu.
          </p>
        </div>
      </div>
    </div>

    <!-- album s 3 fotkami-->
    <div class="container my-5">
      <!-- <h1 class="text-center mb-4">Torty</h1> -->
      <div class="row">
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <div class="square-image">
              <img
                src="images/torta1.jpg"
                class="img-fluid"
                alt="Fotka 1"
              />
            </div>
            <div class="card-body">
              <p class="card-text">
                Čokoládová indulgencia - pre milovníkov čokolády a krému,
                neodolateľná lahôdka.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <div class="square-image">
              <img
                src="images/torta2.jpg"
                class="img-fluid"
                alt="Fotka 2"
              />
            </div>
            <div class="card-body">
              <p class="card-text">
                Torta s ovocím a smotanou - osviežujúci zážitok plný šťavnatého
                ovocia.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <div class="square-image">
              <img
                src="images/torta3.jpg"
                class="img-fluid"
                alt="Fotka 3"
              />
            </div>
            <div class="card-body">
              <p class="card-text">
                Torta s jahodami - svieža, lahodná a plná sladkej jahodovej
                chuťovej explozie.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection